<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Deposito;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class StocksController extends Controller
{

    /**
     * Display a listing of the stocks.
     *
     * @return Illuminate\View\View
     */
    public function indexOld()
    {
        $stocks = Stock::paginate(25);

        return view('stocks.index', compact('stocks'));
    }

    public function index()
    {
        $stocks = DB::Table('vw_stocks')->orderBy('id')->paginate(25);

        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new stock.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
                     /*para el select de depositos */
        $depositos=DB::table('depositos')->get();    

        /* Creo un objeto articulo para poblar */
        $articulo = new Articulo();

        
        return view('stocks.create',compact('depositos','articulo'));
    }

    /**
     * Store a new stock in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Stock::create($data);

            return redirect()->route('stocks.stock.index')
                ->with('success_message', 'Stock fue agregado correctamente.');
        } catch (Exception $exception) {

            $mensaje_error= $exception->getMessage();            

             return back()->withInput()
                ->withErrors([$mensaje_error]);
        }
    }

    /**
     * Display the specified stock.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $stock = Stock::findOrFail($id);


        return view('stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified stock.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
    
        /*para el select de depositos */
        $depositos=DB::table('depositos')->get();   

        /*para repoblar los text input de articulos que puebla el buscador */
        $articulo = Articulo::findOrFail($stock->articulo);
               
        
        /* A la vista le paso la instancia actual de stock, mas la lista de depositos, mas el objeto articulo */
        return view('stocks.edit', compact('stock','depositos','articulo'));
    }

    /**
     * Update the specified stock in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        //dd($request->all());  

        try {
            
            $data = $this->getData($request);
            
            $stock = Stock::findOrFail($id);
            $stock->update($data);

            return redirect()->route('stocks.stock.index')
                ->with('success_message', 'Stock fue modificado correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error Inesperado en el proceso.']);
        }        
    }

    /**
     * Remove the specified stock from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $stock = Stock::findOrFail($id);
            $stock->delete();

            return redirect()->route('stocks.stock.index')
                ->with('success_message', 'Stock fue borrado.');
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
                'articulo' => 'string|min:1|nullable',
            'deposito' => 'string|min:1|nullable',
            'stock' => 'string|min:1|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}

