<?php



//var_dump($argv);

//$prueba = $argv[1];
//$prueba = 'FACA';


//echo DecodEtiqueta( $prueba );

//echo codigo_barras();

//die();


function codigo_barras()
{
    $codigo_barras='';
    $cuitPropio ='20180834711';
    $tipoComp = DecodEtiqueta('FACA');
    $ptovta ='00001';
    $cae  ='69401641905074';
    $_cCodigoBarras = $cuitPropio . $tipoComp . $ptovta . $cae   . "20191013" ;

    //var_dump( $_cCodigoBarras ) ;
    $nLongitud = strlen( $_cCodigoBarras);
    //var_dump($nLongitud ) ;


    /*
    20180834711 011 00003 69401641905074 20191013 7
     11          3    5    14              8      1
     41 +1

    */ 

    $nImpares=0;
	$nPares = 0;

    // 26/10/2019 Migrar los códigos de barras desde programa CONCORDE

    for ($i = 0; $i < $nLongitud ; $i++) {
            $ni = substr( $_cCodigoBarras,$i,1);
            //var_dump($ni ) ;
            //To determine odd or even it's faster and more efficient to use the bitwise & operator:
            $a = $ni;
            if ($a & 1) {
                //echo 'impar';
                $nImpares = $nImpares + $ni;
            } else {
                //echo 'par';
                $nPares = $nPares + $ni     ;           
            }

        
        //var_dump( $i );
    }


    $nSuma = $nImpares * 3 + $nPares ;
    //var_dump("suma");
    //var_dump($nSuma);  
    //die();  
    //strval($var_name)
    $nAux = (int) ( right( strval($nSuma) ,1) ) ;
    //echo $nAux ;
	$nDigitoVerificador = 10 - $nAux ;
    if( $nDigitoVerificador==10 ){
		$nDigitoVerificador=0        ;
    }

	$_cCodigoBarras= $_cCodigoBarras .  strval($nDigitoVerificador)	;

   //var_dump( $_cCodigoBarras  );

   $_cNuevoCodigo='' ;

   for ($i = 0; $i < strlen($_cCodigoBarras); $i+=2) {

        $cPar = substr($_cCodigoBarras,$i,2);
        //var_dump($cPar);
        //die();

        if( (int) $cPar <=49  )
        {

            $cNuevoPar = chr( (int) $cPar + 48 ) ;
            //var_dump($cNuevoPar);
        }

        else
        {
            $cNuevoPar = chr( (int) $cPar + 142 )	;
            var_dump($cNuevoPar);            

        }
        $_cNuevoCodigo= $_cNuevoCodigo.$cNuevoPar ;
        echo $_cNuevoCodigo;

    }

	$_cCodigoBarras = $_cNuevoCodigo  ;

    /*

	FOR 	I=1 TO LEN(_cCodigoBarras) STEP 2
		cPar = SUBSTR(_cCodigoBarras,i,2)
		if VAL(cPar)<=49 && PROBLEMA CON CARACTER 49 CASO DIARO EL EL SOL LOTE 213
			cNuevoPar = chr(VAL(cPar)+48)
		ELSE
			cNuevoPar = chr(VAL(cPar)+142)		
		
		endif
				
		_cNuevoCodigo=_cNuevoCodigo+cNuevoPar
		
		
	NEXT 
    */


    
    return ( $_cCodigoBarras);
}


function DecodEtiqueta($cTipo)
{

$cTipoComp='  ';


switch ($cTipo):
    case $cTipo=='FACA':
        $cTipoComp = '01' ;   
        break;
    case $cTipo=='NDBA':
        $cTipoComp = '02' ;   
        break;        
    case $cTipo=='NCRA':
        $cTipoComp = '03' ;   
        break;
    case $cTipo=='FACB':
        $cTipoComp = '06' ;   
        break;               
    case $cTipo=='NDBB':
        $cTipoComp = '07' ;   
        break;
    case $cTipo=='NCRB':
        $cTipoComp = '08' ;   
        break;        
    case $cTipo=='FACC':
        $cTipoComp = '11' ;   
        break;               
    case $cTipo=='NDBC':
        $cTipoComp = '12' ;   
        break;
    case $cTipo=='NCRC':
        $cTipoComp = '13' ;   
        break;        
    case $cTipo=='FACM':
        $cTipoComp = '51' ;   
        break;               
    case $cTipo=='NDBM':
        $cTipoComp = '52' ;   
        break;
    case $cTipo=='NCRM':
        $cTipoComp = '53' ;   
        break;        


    default:
        $cTipoComp = '  ' ;       
endswitch;

return ( $cTipoComp );

}

function left($str, $length) {
    return substr($str, 0, $length);
}

function right($str, $length) {
    return substr($str, -$length);
}