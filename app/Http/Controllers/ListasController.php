<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use Illuminate\Http\Request;
use Exception;

class ListasController extends Controller
{

    /**
     * Display a listing of the listas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $listas = Lista::paginate(100);

        return view('listas.index', compact('listas'));
    }

    /**
     * Show the form for creating a new lista.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('listas.create');
    }

    /**
     * Store a new lista in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Lista::create($data);

            return redirect()->route('listas.lista.index')
                ->with('success_message', 'Lista fue agregado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }
    }

    /**
     * Display the specified lista.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $lista = Lista::findOrFail($id);

        return view('listas.show', compact('lista'));
    }

    /**
     * Show the form for editing the specified lista.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $lista = Lista::findOrFail($id);
        

        return view('listas.edit', compact('lista'));
    }

    /**
     * Update the specified lista in the storage.
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
            
            $lista = Lista::findOrFail($id);
            $lista->update($data);

            return redirect()->route('listas.lista.index')
                ->with('success_message', 'Lista fue modificado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }        
    }

    /**
     * Remove the specified lista from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $lista = Lista::findOrFail($id);
            $lista->delete();

            return redirect()->route('listas.lista.index')
                ->with('success_message', 'Lista fue borrado.');
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
                'idarticulo' => 'string|min:1|nullable',
            'Descripcion' => 'string|min:1|nullable',
            'rubro' => 'string|min:1|nullable',
            'precio2' => 'string|min:1|nullable',
            'precio3' => 'string|min:1|nullable',
            'precio4' => 'string|min:1|nullable',
            'precio5' => 'string|min:1|nullable',
            'costo_ult_comp' => 'string|min:1|nullable',
            'gasto' => 'string|min:1|nullable',
            'item1' => 'string|min:1|nullable',
            'item2' => 'string|min:1|nullable',
            'item3' => 'string|min:1|nullable',
            'item4' => 'string|min:1|nullable',
            'set1' => 'string|min:1|nullable',
            'set2' => 'string|min:1|nullable',
            'set3' => 'string|min:1|nullable',
            'set4' => 'string|min:1|nullable',
            'proveedor' => 'string|min:1|nullable',
            'artprov' => 'string|min:1|nullable',
            'stockable' => 'string|min:1|nullable',
            'marca' => 'string|min:1|nullable',
            'empresa' => 'string|min:1|nullable',
            'dtUltCambioPrecio' => 'string|min:1|nullable',
            'importado' => 'string|min:1|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
