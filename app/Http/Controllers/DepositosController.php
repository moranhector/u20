<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Deposito;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class DepositosController extends Controller
{

    /**
     * Display a listing of the depositos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $depositos = Deposito::paginate(25);

        return view('depositos.index', compact('depositos'));
    }

    /**
     * Show the form for creating a new deposito.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('depositos.create');
    }

    /**
     * Store a new deposito in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Deposito::create($data);

            return redirect()->route('depositos.deposito.index')
                ->with('success_message', 'Deposito fue agregado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }
    }

    /**
     * Display the specified deposito.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $deposito = Deposito::findOrFail($id);

        return view('depositos.show', compact('deposito'));
    }

    /**
     * Show the form for editing the specified deposito.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $deposito = Deposito::findOrFail($id);
        

        return view('depositos.edit', compact('deposito'));
    }

    /**
     * Update the specified deposito in the storage.
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
            
            $deposito = Deposito::findOrFail($id);
            $deposito->update($data);

            return redirect()->route('depositos.deposito.index')
                ->with('success_message', 'Deposito fue modificado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }        
    }

    /**
     * Remove the specified deposito from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deposito = Deposito::findOrFail($id);
            $deposito->delete();

            return redirect()->route('depositos.deposito.index')
                ->with('success_message', 'Deposito fue borrado.');
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
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
