<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use App\Models\Detalle;
use App\Models\Cliente;
use App\Models\Sistema;
use Illuminate\Http\Request;
use Exception;
use DB;
use Carbon\Carbon;

// incorporo librerias AFIP
use App\Afip\wsaa;
use App\Afip\wsfev1;
use App\Afip\wsafip;

use PdfController;
use Mpdf\Mpdf;





class FacturasController extends Controller
{

    /**
     * Display a listing of the facturas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $facturas = Factura::paginate(25);

        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new factura.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
   

             /*listar los productos en ventana modal*/
             $articulos=DB::table('articulos as ar')
             ->select(DB::raw('CONCAT(ar.ean13," ",ar.descrip) AS articulo'),'ar.id','ar.precio')
             ->get(); 

             /*listar las clientes en ventana modal*/
             $clientes=DB::table('clientes')->get();     

             //Factura Electrónica
             $CUIT = "20180834711";
             $MODO = 0;
             $afip = new wsfev1($CUIT,$MODO);
             //$result = $afip->consultarUltimoComprobanteAutorizado(1, 1);
             $result = $afip->consultarUltimoComprobanteAutorizado(1, 11);             
             $nueva_factura = $result +1 ;     
             $nueva_factura = zeros($nueva_factura,8)   ;     


        
        return view('facturas.create',[
            "clientes"=>$clientes,
            "articulos"=>$articulos,
            "nueva_factura"=>$nueva_factura,
            ]);        
        //return view('facturas.create2');
    }

    /**
     * Show the form for creating a new factura.
     *
     * @return Illuminate\View\View
     */
    public function prepara($tipofactura)
    {
   

             /*listar los productos en ventana modal*/
             $articulos=DB::table('articulos as ar')
             ->select(DB::raw('CONCAT(ar.ean13," ",ar.descrip) AS articulo'),'ar.id','ar.precio')
             ->get(); 

             /*listar las clientes en ventana modal*/
             $clientes=DB::table('clientes')->get();     

             //Factura Electrónica
             $CUIT = "20180834711";
             $MODO = 0;
             $afip = new wsfev1($CUIT,$MODO);
             //$result = $afip->consultarUltimoComprobanteAutorizado(1, 1);

             $nTipoFactura = TipoFacturaAfip($tipofactura) ; //Obtengo el código numérico



             $result = $afip->consultarUltimoComprobanteAutorizado(1,$nTipoFactura);             
             $nueva_factura = $result +1 ;     
             $nueva_factura = zeros($nueva_factura,8)   ;     

             //$factura = new Factura();
             //$factura->ptovta = '0001';
        
        return view('facturas.create',[
            "clientes"=>$clientes,
            "articulos"=>$articulos,
            "nueva_factura"=>$nueva_factura,
            "tipofactura"=>$tipofactura,   
            ]);        

    }




    /**
     * Store a new factura in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        
        //dd($request->all());        

        try{
 
            DB::beginTransaction();
            $mytime= Carbon::now('America/Argentina/Mendoza');

            $factura = new Factura();
            $factura->nombre = $request->nombre;

            $nombrecliente = $factura->nombre ; 
      
            $factura->fecha = $mytime->toDateString();

            $factura->cuit =   $request->cuit;
            $factura->tipo =   $request->tipo;
            $factura->ptovta =   $request->ptovta;            
            $factura->nrocomp =   $request->nrocomp;                        
            $factura->imptot   =$request->total_pagar;

            if( $factura->tipo=="A" )   // RESPONSABLE INSCRIPTO
            {
                $importegravado =  round( $factura->imptot / 1.21, 2 ) ;
                $factura->impiva   = round( $factura->imptot - $importegravado ,2) ;  
                $codigoCondicionIVA= 5 ;      
                $alicuota = 21 ;       
                
                // En facturas A hay que pasar el Objeto IVA 
                $subtotivas= Array(
                    0 => Array
                        (
                            "codigo" => $codigoCondicionIVA,
                            "Alic" => $alicuota,
                            "importe" => $factura->impiva,  // "importe" => 21.00, $factura->impiva,
                            "BaseImp" => $importegravado   //  "BaseImp" => 100.00 $importegravado
                        )
                        );

            }

            
            if( $factura->tipo=="C" )   // MONOTRIBUTISTA
            {
                $importegravado =  $factura->imptot  ;
                $factura->impiva   = 0 ;                              
                $codigoCondicionIVA= 1 ;                                                
                $alicuota = 0 ;                                      
                $subtotivas= Array();  // En facturas Monotributo el Objeto IVA tiene que ir vacío

            }            


            //$cliente = new Cliente();
            $cliente = Cliente::where('cuit', $factura->cuit  )->first();    

            //dd($cliente);

            $domicilio = $cliente->domicilio  ;




            //$importegravado =  round( $factura->imptot / 1.21, 2 ) ;
            $factura->impiva   = $factura->imptot - $importegravado ;

            $factura->domicilio = $domicilio ;

            $factura->save();





            //AQUI TRANSFORMO LAS VARIABLES DEL REQUEST QUE VIENEN EN ARRAY A VARIABLES ARRAY DEL CONTROLADOR
            $id_producto=$request->id_producto;
            $cantidad=$request->cantidad;
            $precio=$request->precio_venta;
            $producto=$request->producto;

            $nTipoFactura = TipoFacturaAfip($factura->tipo) ; //Obtengo el código numérico

            
            //Recorro todos los elementos
            $cont=0;

            $items = Array();            

             while($cont < count($id_producto)){

                $detalle = new Detalle();
                /*enviamos valores a las propiedades del objeto detalle*/
                /*al idcompra del objeto detalle le envio el id del objeto venta, que es el objeto que se ingresó en la tabla ventas de la bd*/
                /*el id es del registro de la venta*/
                $detalle->id_factura = $factura->id;
                $detalle->id_articulo = $id_producto[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio = $precio[$cont];
                $detalle->descrip = substr( $producto[$cont] ,14 ) ;      // DESCARTO EL EAN 13 QUE VIENE A LA IZQUIERDA          

                if( $factura->tipo=="A" )   // RESPONSABLE INSCRIPTO
                {               

                    $itemtotal = round( $detalle->cantidad * $detalle->precio  ,2 ) ;
                    $itemgravado = round( $detalle->cantidad * $detalle->precio / 1.21 , 2 )  ;
                    $itemiva = round( $itemtotal - $itemgravado, 2) ;  
                    $itemalicuota = 21 ;      
                }    
                if( $factura->tipo=="C" )   // MONOTRIBUTISTA
                {
                    $itemtotal = round( $detalle->cantidad * $detalle->precio  ,2 ) ;
                    $itemgravado = $itemtotal  ;
                    $itemiva = 0  ; 
                    $itemalicuota = 0 ;
                }

                
                $detalle->importe = $itemtotal ;
                $detalle->gravado = $itemgravado ;
                $detalle->iva     = $itemiva ;
                $detalle->alicuota = $itemalicuota ;

                $detalle->save();


                array_push($items,Array(
                    "codigo" => 112233445566,
                    "scanner" => 112233445566,
                    "descripcion" => 'Producto de prueba',
                    "codigoUnidadMedida" => 7,
                    "UnidadMedida" => "Unidades",
                    "codigoCondicionIVA" => $codigoCondicionIVA ,
                    "Alic" => $itemalicuota ,
                    "cantidad" =>  $detalle->cantidad , // "cantidad" => 1.00, 
                    "porcBonif" => 0.000,
                    "impBonif" => 0.000,
                    "precioUnitario" => $itemgravado , // "precioUnitario" => 100.00,
                    "importeIVA" => $itemiva   ,  // "importeIVA" => 21.000,
                    "importeItem" => $itemtotal // "importeItem" => 121.00
            ));






                $cont=$cont+1;
            }
                
            DB::commit();

            //Segunda recorrida de los renglones para informar a AFIP

            /*
            $cont=0;
            $items = Array();

             while($cont < count($id_producto)){

                array_push($items,Array(
                        "codigo" => 112233445566,
                        "scanner" => 112233445566,
                        "descripcion" => 'Producto de prueba',
                        "codigoUnidadMedida" => 7,
                        "UnidadMedida" => "Unidades",
                        "codigoCondicionIVA" => $codigoCondicionIVA ,
                        "Alic" => $alicuota ,
                        "cantidad" =>  $detalle->cantidad , // "cantidad" => 1.00, 
                        "porcBonif" => 0.000,
                        "impBonif" => 0.000,
                        "precioUnitario" => $importegravado , // "precioUnitario" => 100.00,
                        "importeIVA" => $factura->impiva,  // "importeIVA" => 21.000,
                        "importeItem" => $factura->imptot // "importeItem" => 121.00
                ));

                $cont=$cont+1;                

            }            

            */


            //FACTURA ELECTRONICA 

            $CUIT = "20180834711";
            $MODO = 0;
            $afip = new wsfev1($CUIT,$MODO);

            $result = $afip->consultarUltimoComprobanteAutorizado(1, $nTipoFactura);
            $nuevaFactura = $result +1 ;

   
     


            $fechaFactura = Fecha();





            //dd($fechaFactura);
            $voucher = Array(
                "idVoucher" => 1,
                "numeroComprobante" => $nuevaFactura, // Debe estar sincronizado con el último número de AFIP
                "numeroPuntoVenta" =>  1,
                "cae" => 0,
                "letra" => $factura->tipo , // parametrizo el tipo de factura
                "fechaVencimientoCAE" => "",
                "tipoResponsable" => "IVA Responsable Inscripto",
                "nombreCliente" =>  $nombrecliente ,
                "domicilioCliente" => $domicilio ,
                "fechaComprobante" => $fechaFactura,
                "codigoTipoComprobante" => $nTipoFactura, // 1,
                "TipoComprobante" => "Factura",
                "codigoConcepto" => 1,
                "codigoMoneda" => "PES",
                "cotizacionMoneda" => 1.000,
                "fechaDesde" => $fechaFactura,
                "fechaHasta" => $fechaFactura,
                "fechaVtoPago" => $fechaFactura,
                "codigoTipoDocumento" => 80,
                "TipoDocumento" => "CUIT", // DECIA "DNI" 
                "numeroDocumento" => $factura->cuit, // Debe ser diferente al CUIT emisor
                "importeTotal" => $factura->imptot , // "importeTotal" => 121.000, 
                "importeOtrosTributos" => 0.000,
                "importeGravado" => $importegravado ,  //  "importeGravado" => 100.000,
                "importeNoGravado" => 0.000,
                "importeExento" => 0.000,
                "importeIVA" => $factura->impiva, // "importeIVA" => 21.000,
                "codigoPais" => 200,
                "idiomaComprobante" => 1,
                "NroRemito" => 0,
                "CondicionVenta" => "Efectivo",
                "items" => $items,                 
                "subtotivas" => $subtotivas,    
                "Tributos" => Array(),
                "CbtesAsoc" => Array()
            );


            $nuevaFactura = zeros($nuevaFactura,8).".json" ;
            $fp = fopen($nuevaFactura, 'w');
            fwrite($fp, serialize($voucher));
            fclose($fp);


            //dd($voucher);
            // Function emitirComprobante en archivo app\Afip\wsfev1.php
            $result = $afip->emitirComprobante($voucher);  
            //print_r($result);
            //dd($result);

            $factura->cae = $result["cae"];
            $fecvtocae = $result["fechaVencimientoCAE"];            
            $nuevafecha=substr($fecvtocae,0,4)."-".substr($fecvtocae,4,2)."-".substr($fecvtocae,6,2);
            $factura->fecvtocae = $nuevafecha;
            $factura->resultado = "A";
            $factura-> save();

   

            // Aqui construyo el link de impresion que va en el botón de la barra de herramientas
            $link_impresion = url('/facturas/imprimir/'.$factura->id);


            ////////////////////////////////////////////
            //return redirect()->route('facturas.factura.index')
            // Devuelvo elementos para la barra de herramientas, y el link para imprimir la factura recién hecha

            return back()->withInput()
            ->with('success_message', 'Ultima Factura grabada: '.$factura->nrocomp )            
            ->with('link_impresion',$link_impresion );            

        } catch(Exception $e){
            
 
            $mensaje_error= $e->getMessage();


            //die();
            //dd($tipoerror);

            //print_r(get_object_vars($e->message));
            //die()

            return back()->withInput()
                ->withErrors([$mensaje_error]);


        }


    }



    /**
     * Display the specified factura.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $factura = Factura::findOrFail($id);


        

        return view('facturas.show', compact('factura'));
    }





    /**
     * Show the form for editing the specified factura.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        

        return view('facturas.edit', compact('factura'));
    }

    /**
     * Update the specified factura in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $factura = Factura::findOrFail($id);
            $factura->update($data);

            return redirect()->route('facturas.factura.index')
                ->with('success_message', 'Factura fue modificado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }        
    }

    /**
     * Remove the specified factura from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $factura = Factura::findOrFail($id);
            $factura->delete();

            return redirect()->route('facturas.factura.index')
                ->with('success_message', 'Factura fue borrado.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'nombre' => 'string|min:1|nullable',            
            'tipo' => 'string|min:1|nullable',
            'ptovta' => 'string|min:4|nullable',
            'nrocomp' => 'string|min:8|nullable|max:8',
            'cuit' => 'string|min:11|nullable|max:11',
            'imptot' => 'numeric|max:999999999.99',            
            'impiva' => 'numeric|max:999999999.99',
            'fecha' => 'string|min:8|nullable',                                       
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

    public function FechaAfip()
    {

        $fecha = Carbon::today();
        $fecha = $date->format('Ymd');   
        // Esto debe devolver AAAAMMDD por ejemplo  "20190909"

        //dd($fecha);

        return $fecha;

    }

    /**
     * Imprime en PDF LA factura.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function imprimir($id)
    {
        $factura = Factura::findOrFail($id);

 
        $detalle = detalle::where('id_factura', $id)->get()->toArray();

        //dd($detalle);

        $this->pdf($factura,$detalle);
        

        return view('facturas.show', compact('factura'));
    }



    public function pdf($factura,$detalle,$accion='ver',$tipo='digital')
    {


        $sistema = Sistema::findOrFail(1);

        $cuit_cliente = $factura->cuit;        
        //$ruc = "10072486893";
        $numero = $factura->nrocomp;
        $nombres = $factura->nombre;
        $dia = "09";
        $mes = "04";
        $ayo = "17";

        $direccion = $factura->domicilio ;

        $dni = "23918745";
        $total = 0;

        //print_r($detalle);
        //die();



        //$total = number_format($total,2,'.',' ');
 
        $data['cuit_cliente'] = $cuit_cliente;
        $data['numero'] = $numero;
        $data['nombres'] = $nombres;
        $data['dia'] = $dia;
        $data['mes'] = $mes;
        $data['ayo'] = $ayo;
        $data['direccion'] = $direccion;
        $data['dni'] = $dni;

        $data['detalle'] = $detalle;        
        $data['total'] = $factura->imptot;
        $data['tipo'] = $tipo;
        $data['propietario'] = $sistema->propietario;
        $data['ingresos_brutos'] = $sistema->ingresos_brutos;        
        $data['fecha_inicio'] = $sistema->fecha_inicio;                
 
        //AQUI VA LA VISTA PDF DE LA FACTURA

        if($accion=='html'){
            return view('pdf.factura',$data);
        }else{
            $html = view('pdf.factura',$data)->render();
        }


        $namefile = 'boleta_de_venta_'.time().'.pdf';
 
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
 
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();

        $codigobarras = codigo_barras();
        dd($codigobarras);

        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/fonts',
            ]),
            'fontdata' => $fontData + [
                'arial' => [
                    'R' => 'arial.ttf',
                    'B' => 'arialbd.ttf',
                ],
            ],
            'default_font' => 'arial',
            "format" => "A4",
            //"format" => [264.8,188.9],
        ]);
        // $mpdf->SetTopMargin(5);

        //PIE DE PAGINA    
        $mpdf->SetHTMLFooter('
        <table width="100%">
            <tr>

             <td width="73%" align="left"><img id="logo" src="images/logoafip.jpg" alt="" width="150" height="57"></td> 


            </tr>
            <tr>
            <td>'.$codigobarras.'
            </td>
            </tr>

            <tr>
                <td width="33%">{DATE j/m/Y}</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right;">Factura Electrónica</td>
            </tr>            
        </table>');


        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        // dd($mpdf);
        if($accion=='ver'){
            $mpdf->Output($namefile,"I");
        }elseif($accion=='descargar'){
            $mpdf->Output($namefile,"D");
        }
    }






}

///// FUNCIONES GENERALES FUERA DE LA CLASE

function Fecha()
{

    $date = Carbon::today();
    $fecha = $date->format('Ymd');   
    // Esto debe devolver AAAAMMDD por ejemplo  "20190909"

    //dd($fecha);

    echo $fecha;
    return $fecha;
}

function zeros($cadena,$longitud)
{

    $zeros =  substr("00000000".$cadena,-1 * $longitud ,$longitud);
    //dd($zeros);
    return $zeros;
}

////////////////////////////////////////////

function TipoFacturaAfip($tipofactura)
{
    $nTipoFactura = 1;

    switch ($tipofactura):
        case "A":
            $nTipoFactura = 1;
            break;
        case "B":
            $nTipoFactura = 6 ;
            break;                    
        case "C":
            $nTipoFactura = 11 ;
            break;                                        
        default:
        $nTipoFactura = 1;
    endswitch;            

    return $nTipoFactura ;
}
////////////////////////////////////////////////

function jsonToReadable($json){
    $tc = 0;        //tab count
    $r = '';        //result
    $q = false;     //quotes
    $t = "\t";      //tab
    $nl = "\n";     //new line

    for($i=0;$i<strlen($json);$i++){
        $c = $json[$i];
        if($c=='"' && $json[$i-1]!='\\') $q = !$q;
        if($q){
            $r .= $c;
            continue;
        }
        switch($c){
            case '{':
            case '[':
                $r .= $c . $nl . str_repeat($t, ++$tc);
                break;
            case '}':
            case ']':
                $r .= $nl . str_repeat($t, --$tc) . $c;
                break;
            case ',':
                $r .= $c;
                if($json[$i+1]!='{' && $json[$i+1]!='[') $r .= $nl . str_repeat($t, $tc);
                break;
            case ':':
                $r .= $c . ' ';
                break;
            default:
                $r .= $c;
        }
    }
    return $r;
}


$result = include_once 'codigo.php';  // $result = true













/*
FUNCTION GenerarCodigo()

	PUBLIC _cCodigoBarras
	
		cTipoComp = this.DecodEtiqueta(this._etiqueta)
		*SET STEP ON 
		
 	*this._fecvtocae=CTOD('25/7/2015')
 	*ojo parche
	*SET STEP ON 	
	cFechaDGI = fechaAfip(this._fecvtocae)
	_cCodigoBarras = this._cuitPropio+cTipoComp+this._ptovta+this._cae + fechaAfip(this._fecvtocae) &&+'1'
	_cCodigoBarras = ALLTRIM( _cCodigoBarras )
	STRTOFILE(_cCodigoBarras,'codigobarras.txt')
	*_cCodigoBarras = this._cuitPropio+cTipoComp+this._ptovta+this._cae + (this._fecvtocae) &&+'1'	
	*_cCodigoBarras = this._cuitPropio+cTipoComp+this._ptovta+this._cae + (this._fecvtocae) &&+'1'	

	nImpares=0
	nPares = 0
	FOR i=1 TO LEN(_cCodigoBarras)
		ni = VAL(SUBSTR(_cCodigoBarras,i,1))
		IF !MOD(ni,2)=0 && impar
			nImpares = nImpares + ni
		ENDIF
		IF MOD(ni,2)=0 && par
			npares = npares + ni
		endif
	
	next
	nSuma = nImpares * 3 + nPares
	nAux = VAL(RIGHT(ALLTRIM(STR(nSuma,10,0)),1))
	nDigitoVerificador= 10 - nAux
	IF nDigitoVerificador=10
		nDigitoVerificador=0
	ENDIF
	_cCodigoBarras= _cCodigoBarras + ALLTRIM(STR(nDigitoVerificador,1,0)	)
	_cNuevoCodigo=''
	FOR 	I=1 TO LEN(_cCodigoBarras) STEP 2
		cPar = SUBSTR(_cCodigoBarras,i,2)
		if VAL(cPar)<=49 && PROBLEMA CON CARACTER 49 CASO DIARO EL EL SOL LOTE 213
			cNuevoPar = chr(VAL(cPar)+48)
		ELSE
			cNuevoPar = chr(VAL(cPar)+142)		
		
		endif
				
		_cNuevoCodigo=_cNuevoCodigo+cNuevoPar
		
		
	NEXT 
	
	_cCodigoBarras = _cNuevoCodigo
	RETURN 
	*/////////////////////////////////////////////////////////////////////////////////


//*/



