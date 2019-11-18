<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Puntoventa;
use Illuminate\Http\Request;
use Exception;

class PuntoventasController extends Controller
{

    /**
     * Display a listing of the puntoventas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $puntoventas = Puntoventa::paginate(25);

        return view('puntoventas.index', compact('puntoventas'));
    }

    /**
     * Show the form for creating a new puntoventa.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('puntoventas.create');
    }

    /**
     * Store a new puntoventa in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //dd($request->all());
        try {
            
            $data = $this->getData($request);
            
            Puntoventa::create($data);

            return redirect()->route('puntoventas.puntoventa.index')
                ->with('success_message', 'Punto de venta fue agregado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }
    }

    /**
     * Display the specified puntoventa.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $puntoventa = Puntoventa::findOrFail($id);

        return view('puntoventas.show', compact('puntoventa'));
    }

    /**
     * Show the form for editing the specified puntoventa.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $puntoventa = Puntoventa::findOrFail($id);
        

        return view('puntoventas.edit', compact('puntoventa'));
    }

    /**
     * Update the specified puntoventa in the storage.
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
            
            $puntoventa = Puntoventa::findOrFail($id);
            $puntoventa->update($data);

            return redirect()->route('puntoventas.puntoventa.index')
                ->with('success_message', 'Punto de venta fue modificado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }        
    }

    /**
     * Remove the specified puntoventa from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $puntoventa = Puntoventa::findOrFail($id);
            $puntoventa->delete();

            return redirect()->route('puntoventas.puntoventa.index')
                ->with('success_message', 'Puntoventa fue borrado.');
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
                'numero' => 'numeric',
                'sistema' => 'string|min:1|nullable',
                'domicilio' => 'string|min:1|nullable',                                               
        ];

        
        $data = $request->validate($rules);




        return $data;

        $rules = [
            'nombre' => 'string|min:1|nullable',
        'numero' => 'numeric|min:4|nullable|string',
        'sistema' => 'string|min:1|nullable',
        'domicilio' => 'string|min:1|nullable',
        'fechadesde' => 'date|nullable|date_format:j/n/Y g:i A',
        'habilitado' => 'string|min:1|nullable|boolean', 
    ];



    }

}
