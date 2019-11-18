<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Exception;
use DB;

class ClientesController extends Controller
{

    /**
     * Display a listing of the clientes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $clientes = Cliente::paginate(25);

        return view('clientes.index', compact('clientes'));
    }

    public function seleccionar(Request $request)
    {
        //$clientes = Cliente::paginate(25);

        //return view('clientes.seleccionar', compact('clientes'));

        if($request){

            $sql=trim($request->get('buscarTexto'));
            $clientes=DB::table('clientes')
            ->where('nombre','LIKE','%'.$sql.'%')
            ->orwhere('cuit','LIKE','%'.$sql.'%')
            ->orderBy('id','desc')
            ->paginate(8);
            return view('clientes.seleccionar',["clientes"=>$clientes,"buscarTexto"=>$sql]);
            //return $clientes;
        }






    }

    

    /**
     * Show the form for creating a new cliente.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('clientes.create');
    }

    /**
     * Store a new cliente in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Cliente::create($data);

            return redirect()->route('clientes.cliente.index')
                ->with('success_message', 'Cliente fue agregado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }
    }

    /**
     * Display the specified cliente.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified cliente.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        

        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified cliente in the storage.
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
            
            $cliente = Cliente::findOrFail($id);
            $cliente->update($data);

            return redirect()->route('clientes.cliente.index')
                ->with('success_message', 'Cliente fue modificado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }        
    }

    /**
     * Remove the specified cliente from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();

            return redirect()->route('clientes.cliente.index')
                ->with('success_message', 'Cliente fue borrado.');
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
            'cuit' => 'string|min:1|nullable',
            'iva_cond' => 'string|min:1|nullable',
            'domicilio' => 'string|min:1|nullable',
            'telefono' => 'string|min:1|nullable',
            'email' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

    /*
    public function findbycuit($cuit)
    {
        //$cliente = Cliente::findOrFail($id);
        
        $clientes=DB::table('clientes')
        ->where('cuit','=',$cuit)

        return view('clientes.edit', compact('cliente'));
    }    
    */


}
