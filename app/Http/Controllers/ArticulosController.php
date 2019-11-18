<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Exception;
use DB;

class ArticulosController extends Controller
{

    /**
     * Display a listing of the articulos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $articulos = Articulo::paginate(25);

        return view('articulos.index', compact('articulos'));
    }



    public function seleccionar(Request $request)
    {
 

        if($request){

            $sql=trim($request->get('buscarTexto'));
            $articulos=DB::table('articulos')
            ->where('descrip','LIKE','%'.$sql.'%')
            ->orwhere('codigo','LIKE','%'.$sql.'%')
            ->orderBy('descrip','desc')
            ->paginate(8);
            return view('articulos.seleccionar',["articulos"=>$articulos,"buscarTexto"=>$sql]);
            //return $clientes;
        }






    }    

    /**
     * Show the form for creating a new articulo.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('articulos.create');
    }

    /**
     * Store a new articulo in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Articulo::create($data);

            return redirect()->route('articulos.articulo.index')
                ->with('success_message', 'Articulo fue agregado correctamente.');
        } catch (Exception $exception) {

            $mensaje_error= $exception->getMessage();            

            //return back()->withInput()
              //  ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);

            return back()->withInput()
                ->withErrors([$mensaje_error]);


        }
    }

    /**
     * Display the specified articulo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);

        return view('articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified articulo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        

        return view('articulos.edit', compact('articulo'));
    }

    /**
     * Update the specified articulo in the storage.
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
            
            $articulo = Articulo::findOrFail($id);
            $articulo->update($data);

            return redirect()->route('articulos.articulo.index')
                ->with('success_message', 'Articulo fue modificado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }        
    }

    /**
     * Remove the specified articulo from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $articulo = Articulo::findOrFail($id);
            $articulo->delete();

            return redirect()->route('articulos.articulo.index')
                ->with('success_message', 'Articulo fue borrado.');
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
                'descrip' => 'string|min:1|nullable',
            'ean13' => 'string|min:1|nullable',
            'codigo' => 'string|min:1|nullable',            
            'id_rubro' => 'string|min:1|nullable',
            'umedida' => 'string|min:1|nullable',
            'precio' => 'string|min:1|nullable|numeric|max:999999999.99', 
            'costo' => 'string|min:1|nullable|numeric|max:999999999.99',             
            'costod' => 'string|min:1|nullable|numeric|max:999999999.99',                         
            'codigoprov' => 'string|min:1|nullable',            
            'proveedor' => 'string|min:1|nullable',            

        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
