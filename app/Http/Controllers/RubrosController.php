<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rubro;
use Illuminate\Http\Request;
use Exception;

class RubrosController extends Controller
{

    /**
     * Display a listing of the rubros.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $rubros = Rubro::paginate(25);

        return view('rubros.index', compact('rubros'));
    }

    /**
     * Show the form for creating a new rubro.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('rubros.create');
    }

    /**
     * Store a new rubro in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Rubro::create($data);

            return redirect()->route('rubros.rubro.index')
                ->with('success_message', 'Rubro fue agregado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }
    }

    /**
     * Display the specified rubro.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $rubro = Rubro::findOrFail($id);

        return view('rubros.show', compact('rubro'));
    }

    /**
     * Show the form for editing the specified rubro.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $rubro = Rubro::findOrFail($id);
        

        return view('rubros.edit', compact('rubro'));
    }

    /**
     * Update the specified rubro in the storage.
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
            
            $rubro = Rubro::findOrFail($id);
            $rubro->update($data);

            return redirect()->route('rubros.rubro.index')
                ->with('success_message', 'Rubro fue modificado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }        
    }

    /**
     * Remove the specified rubro from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $rubro = Rubro::findOrFail($id);
            $rubro->delete();

            return redirect()->route('rubros.rubro.index')
                ->with('success_message', 'Rubro fue borrado.');
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
                'name' => 'string|min:1|max:255|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
