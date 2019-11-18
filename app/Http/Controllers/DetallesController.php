<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Detalle;
use Illuminate\Http\Request;
use Exception;

class DetallesController extends Controller
{

    /**
     * Display a listing of the detalles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $detalles = Detalle::paginate(25);

        return view('detalles.index', compact('detalles'));
    }

    /**
     * Show the form for creating a new detalle.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('detalles.create');
    }

    /**
     * Store a new detalle in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Detalle::create($data);

            return redirect()->route('detalles.detalle.index')
                ->with('success_message', 'Detalle fue agregado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }
    }

    /**
     * Display the specified detalle.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $detalle = Detalle::findOrFail($id);

        return view('detalles.show', compact('detalle'));
    }

    /**
     * Show the form for editing the specified detalle.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $detalle = Detalle::findOrFail($id);
        

        return view('detalles.edit', compact('detalle'));
    }

    /**
     * Update the specified detalle in the storage.
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
            
            $detalle = Detalle::findOrFail($id);
            $detalle->update($data);

            return redirect()->route('detalles.detalle.index')
                ->with('success_message', 'Detalle fue modificado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }        
    }

    /**
     * Remove the specified detalle from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $detalle = Detalle::findOrFail($id);
            $detalle->delete();

            return redirect()->route('detalles.detalle.index')
                ->with('success_message', 'Detalle fue borrado.');
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
            'id_articulo' => 'numeric|min:1|nullable',
            'cantidad' => 'numeric|min:1|nullable|max:999999999.99',
            'precio' => 'numeric|min:1|nullable|max:999999999.99',
            'importe' => 'numeric|min:1|nullable|max:999999999.99', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
