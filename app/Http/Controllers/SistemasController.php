<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sistema;
use Illuminate\Http\Request;
use Exception;

class SistemasController extends Controller
{

    /**
     * Display a listing of the sistemas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $sistemas = Sistema::paginate(25);

        return view('sistemas.index', compact('sistemas'));
    }

    /**
     * Show the form for creating a new sistema.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('sistemas.create');
    }

    /**
     * Store a new sistema in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Sistema::create($data);

            return redirect()->route('sistemas.sistema.index')
                ->with('success_message', 'Sistema fue agregado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }
    }

    /**
     * Display the specified sistema.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $sistema = Sistema::findOrFail($id);

        return view('sistemas.show', compact('sistema'));
    }

    /**
     * Show the form for editing the specified sistema.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $sistema = Sistema::findOrFail($id);
        

        return view('sistemas.edit', compact('sistema'));
    }

    /**
     * Update the specified sistema in the storage.
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
            
            $sistema = Sistema::findOrFail($id);
            $sistema->update($data);

            return redirect()->route('sistemas.sistema.index')
                ->with('success_message', 'Sistema fue modificado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }        
    }

    /**
     * Remove the specified sistema from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $sistema = Sistema::findOrFail($id);
            $sistema->delete();

            return redirect()->route('sistemas.sistema.index')
                ->with('success_message', 'Sistema fue borrado.');
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
                'propietario' => 'string|min:1|nullable',
            'cuit' => 'string|min:11|nullable|max:11',
            'condiva' => 'string|min:1|nullable',
            'deposito' => 'string|min:1|nullable',
            'actualiza_stock' => 'string|min:1|nullable',
            'telefono' => 'string|min:1|nullable',
            'email' => 'nullable',
            'domicilio' => 'string|min:1|nullable',
            'ingresos_brutos' => 'string|min:1|nullable',
            'fecha_inicio' => 'string|min:1|nullable',
            'sitio' => 'string|min:1|nullable',
            'logo' => 'string|min:1|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
