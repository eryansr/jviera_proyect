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
Route::get('/admin_inventario', 'AdminController@inventario')->name('inventario');

#################### Fin Rutas Admin ##########################

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

