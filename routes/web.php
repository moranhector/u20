<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('pdf','PdfController@getIndex');
Route::get('pdf/generar','PdfController@getGenerar');

Route::get('/', function () {
     return view('welcome');
 });


 Route::get('/home', function () {
     return view('dashboard');
 }); 



Route::group([
    'prefix' => 'depositos',
], function () {
    Route::get('/', 'DepositosController@index')
         ->name('depositos.deposito.index') ;
    Route::get('/create','DepositosController@create')
         ->name('depositos.deposito.create');
    Route::get('/show/{deposito}','DepositosController@show')
         ->name('depositos.deposito.show')->where('id', '[0-9]+');
    Route::get('/{deposito}/edit','DepositosController@edit')
         ->name('depositos.deposito.edit')->where('id', '[0-9]+');
    Route::post('/', 'DepositosController@store')
         ->name('depositos.deposito.store');
    Route::put('deposito/{deposito}', 'DepositosController@update')
         ->name('depositos.deposito.update')->where('id', '[0-9]+');
    Route::delete('/deposito/{deposito}','DepositosController@destroy')
         ->name('depositos.deposito.destroy')->where('id', '[0-9]+');
});

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home'); */

Route::get('/home2',  'DepositosController@index' ) ->name('Depositos') ;

Route::get('/rubros', 'RubrosController@index') ->name('Rubros');

/* Incorporo una función de búsqueda en creación de facturas para seleccionar clientes */
Route::get('/seleccionarclientes', 'ClientesController@seleccionar')->name('clientes.seleccionar');

/* Incorporo una función de búsqueda en creación de stock para seleccionar articulos */
Route::get('/seleccionararticulos', 'ArticulosController@seleccionar')->name('articulos.seleccionar');

Route::group([
    'prefix' => 'rubros',
], function () {
    Route::get('/', 'RubrosController@index')
         ->name('rubros.rubro.index');
    Route::get('/create','RubrosController@create')
         ->name('rubros.rubro.create');
    Route::get('/show/{rubro}','RubrosController@show')
         ->name('rubros.rubro.show')->where('id', '[0-9]+');
    Route::get('/{rubro}/edit','RubrosController@edit')
         ->name('rubros.rubro.edit')->where('id', '[0-9]+');
    Route::post('/', 'RubrosController@store')
         ->name('rubros.rubro.store');
    Route::put('rubro/{rubro}', 'RubrosController@update')
         ->name('rubros.rubro.update')->where('id', '[0-9]+');
    Route::delete('/rubro/{rubro}','RubrosController@destroy')
         ->name('rubros.rubro.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'articulos',
], function () {
    Route::get('/', 'ArticulosController@index')
         ->name('articulos.articulo.index');
    Route::get('/create','ArticulosController@create')
         ->name('articulos.articulo.create');
    Route::get('/show/{articulo}','ArticulosController@show')
         ->name('articulos.articulo.show')->where('id', '[0-9]+');
    Route::get('/{articulo}/edit','ArticulosController@edit')
         ->name('articulos.articulo.edit')->where('id', '[0-9]+');
    Route::post('/', 'ArticulosController@store')
         ->name('articulos.articulo.store');
    Route::put('articulo/{articulo}', 'ArticulosController@update')
         ->name('articulos.articulo.update')->where('id', '[0-9]+');
    Route::delete('/articulo/{articulo}','ArticulosController@destroy')
         ->name('articulos.articulo.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'clientes',
], function () {
    Route::get('/', 'ClientesController@index')
         ->name('clientes.cliente.index');
    Route::get('/create','ClientesController@create')
         ->name('clientes.cliente.create');
    Route::get('/show/{cliente}','ClientesController@show')
         ->name('clientes.cliente.show')->where('id', '[0-9]+');
    Route::get('/{cliente}/edit','ClientesController@edit')
         ->name('clientes.cliente.edit')->where('id', '[0-9]+');
    Route::post('/', 'ClientesController@store')
         ->name('clientes.cliente.store');
    Route::put('cliente/{cliente}', 'ClientesController@update')
         ->name('clientes.cliente.update')->where('id', '[0-9]+');
    Route::delete('/cliente/{cliente}','ClientesController@destroy')
         ->name('clientes.cliente.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'facturas',
], function () {
    Route::get('/', 'FacturasController@index')
         ->name('facturas.factura.index');
    Route::get('/create','FacturasController@create')
         ->name('facturas.factura.create');
    Route::get('/preparafactura/{tipo}','FacturasController@prepara')
         ->name('facturas.factura.prepara')->where('tipo', '[A-Za-z]+');                 
    Route::get('/show/{factura}','FacturasController@show')
         ->name('facturas.factura.show')->where('id', '[0-9]+');
    Route::get('/imprimir/{factura}','FacturasController@imprimir')
         ->name('facturas.factura.imprimir')->where('id', '[0-9]+');         
    Route::get('/{factura}/edit','FacturasController@edit')
         ->name('facturas.factura.edit')->where('id', '[0-9]+');
    Route::post('/', 'FacturasController@store')
         ->name('facturas.factura.store');
    Route::put('factura/{factura}', 'FacturasController@update')
         ->name('facturas.factura.update')->where('id', '[0-9]+');
    Route::delete('/factura/{factura}','FacturasController@destroy')
         ->name('facturas.factura.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'detalles',
], function () {
    Route::get('/', 'DetallesController@index')
         ->name('detalles.detalle.index');
    Route::get('/create','DetallesController@create')
         ->name('detalles.detalle.create');
    Route::get('/show/{detalle}','DetallesController@show')
         ->name('detalles.detalle.show')->where('id', '[0-9]+');
    Route::get('/{detalle}/edit','DetallesController@edit')
         ->name('detalles.detalle.edit')->where('id', '[0-9]+');
    Route::post('/', 'DetallesController@store')
         ->name('detalles.detalle.store');
    Route::put('detalle/{detalle}', 'DetallesController@update')
         ->name('detalles.detalle.update')->where('id', '[0-9]+');
    Route::delete('/detalle/{detalle}','DetallesController@destroy')
         ->name('detalles.detalle.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'puntoventas',
], function () {
    Route::get('/', 'PuntoventasController@index')
         ->name('puntoventas.puntoventa.index');
    Route::get('/create','PuntoventasController@create')
         ->name('puntoventas.puntoventa.create');
    Route::get('/show/{puntoventa}','PuntoventasController@show')
         ->name('puntoventas.puntoventa.show')->where('id', '[0-9]+');
    Route::get('/{puntoventa}/edit','PuntoventasController@edit')
         ->name('puntoventas.puntoventa.edit')->where('id', '[0-9]+');
    Route::post('/', 'PuntoventasController@store')
         ->name('puntoventas.puntoventa.store');
    Route::put('puntoventa/{puntoventa}', 'PuntoventasController@update')
         ->name('puntoventas.puntoventa.update')->where('id', '[0-9]+');
    Route::delete('/puntoventa/{puntoventa}','PuntoventasController@destroy')
         ->name('puntoventas.puntoventa.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'sistemas',
], function () {
    Route::get('/', 'SistemasController@index')
         ->name('sistemas.sistema.index');
    Route::get('/create','SistemasController@create')
         ->name('sistemas.sistema.create');
    Route::get('/show/{sistema}','SistemasController@show')
         ->name('sistemas.sistema.show')->where('id', '[0-9]+');
    Route::get('/{sistema}/edit','SistemasController@edit')
         ->name('sistemas.sistema.edit')->where('id', '[0-9]+');
    Route::post('/', 'SistemasController@store')
         ->name('sistemas.sistema.store');
    Route::put('sistema/{sistema}', 'SistemasController@update')
         ->name('sistemas.sistema.update')->where('id', '[0-9]+');
    Route::delete('/sistema/{sistema}','SistemasController@destroy')
         ->name('sistemas.sistema.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'stocks',
], function () {
    Route::get('/', 'StocksController@index')
         ->name('stocks.stock.index');
    Route::get('/create','StocksController@create')
         ->name('stocks.stock.create');
    Route::get('/show/{stock}','StocksController@show')
         ->name('stocks.stock.show')->where('id', '[0-9]+');
    Route::get('/{stock}/edit','StocksController@edit')
         ->name('stocks.stock.edit')->where('id', '[0-9]+');
    Route::post('/', 'StocksController@store')
         ->name('stocks.stock.store');
    Route::put('stock/{stock}', 'StocksController@update')
         ->name('stocks.stock.update')->where('id', '[0-9]+');
    Route::delete('/stock/{stock}','StocksController@destroy')
         ->name('stocks.stock.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'listas',
], function () {
    Route::get('/', 'ListasController@index')
         ->name('listas.lista.index');
    Route::get('/create','ListasController@create')
         ->name('listas.lista.create');
    Route::get('/show/{lista}','ListasController@show')
         ->name('listas.lista.show')->where('id', '[0-9]+');
    Route::get('/{lista}/edit','ListasController@edit')
         ->name('listas.lista.edit')->where('id', '[0-9]+');
    Route::post('/', 'ListasController@store')
         ->name('listas.lista.store');
    Route::put('lista/{lista}', 'ListasController@update')
         ->name('listas.lista.update')->where('id', '[0-9]+');
    Route::delete('/lista/{lista}','ListasController@destroy')
         ->name('listas.lista.destroy')->where('id', '[0-9]+');
});
