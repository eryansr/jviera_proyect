<?php

use Illuminate\Support\Facades\Route;

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

//Inicio

Route::view('/',	'inicio')->name('inicio');

//Route::get('/', function () {
 //   return view('welcome');
//});

####################    Rutas Admin   ##########################

Route::get('/admin_users', 'AdminController@index')->name('admin');
Route::post('/users_store', 'AdminController@users_store')->name('users.store');
Route::get('users_edit/{id}', 'AdminController@users_edit')->name('users.edit');
Route::put('users_update/{id}', 'AdminController@users_update')->name('users.update');
Route::delete('users_delete/{id}', 'AdminController@users_delete')->name('users.delete');

Route::get('/admin_inventario', 'AdminController@inventario')->name('inventario');
Route::post('/productos_store', 'AdminController@productos_store')->name('productos.store');
Route::get('productos_edit/{id}', 'AdminController@productos_edit')->name('productos.edit');
Route::put('productos_update/{id}', 'AdminController@productos_update')->name('productos.update');
Route::delete('productos_delete/{id}', 'AdminController@productos_delete')->name('productos.delete');

Route::get('/admin_proveedores', 'AdminController@proveedores')->name('proveedores');
Route::post('/proveedores_store', 'AdminController@proveedores_store')->name('proveedores.store');
Route::get('proveedores_edit/{id}', 'AdminController@proveedores_edit')->name('proveedores.edit');
Route::put('proveedores_update/{id}', 'AdminController@proveedores_update')->name('proveedores.update');
Route::delete('proveedores_delete/{id}', 'AdminController@proveedores_delete')->name('proveedores.delete');

Route::get('/proveedores_productos/{id}', 'AdminController@proveedores_productos')->name('proveedores.productos');
Route::post('/proveedores_productos_store/', 'AdminController@proveedores_productos_store')->name('productos_proveedor.store');

Route::get('/admin_clientes', 'AdminController@clientes')->name('clientes');

Route::get('/admin_balance', 'AdminController@balances')->name('balances');
Route::get('/admin_caja_estatus/{id}', 'AdminController@caja_estatus')->name('caja.estatus');

Route::get('/reportes_generales', 'AdminController@reportes_generales')->name('reportes.generales');
Route::get('reportes_generales_factura/{id}', 'AdminController@reportes_generales_factura')->name('admin.recibo');

################################################################

####################    Rutas Cajas   ##########################

Route::get('/caja', 'CajaController@index')->name('caja');
Route::post('/clientes_store', 'CajaController@clientes_store')->name('clientes.store');
Route::get('cliente_factura/{id}', 'CajaController@factura')->name('factura');
Route::get('factura_clientes_registrados/{id}', 'CajaController@factura_clientes_registrados')->name('factura.clientes_registrados');
Route::post('/factura_store', 'CajaController@factura_store')->name('factura.store');
Route::get('cliente_factura_recibo/{id}', 'CajaController@factura_recibo')->name('factura.recibo');
Route::get('caja_recibo/{numero_factura}', 'CajaController@caja_recibo')->name('caja.recibo');

Route::get('/reportes_caja', 'CajaController@reportes')->name('caja.reportes');

################################################################


Route::view('/nosotros',	'nosotros')->name('nosotros');
Route::view('/contacto',	'contacto')->name('contacto');

Route::post('contacto',	'contactocontroller@store');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//dashboard


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

