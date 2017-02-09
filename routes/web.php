<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('almacen/equipo','EquipoController');
Route::resource('almacen/gadget','GadgetController');
Route::resource('almacen/ubicacion','UbicacionController');
Route::resource('almacen/usuario','UsuarioController');
Route::resource('almacen/principal','PrincipalController');

Route::get('almacen/verImportar','UsuarioController@verImportar')->name("verImportar");
Route::get('almacen/importar','UsuarioController@importar')->name("importar");

Route::get('almacen/enviar','IncidenciasController@mostrarEnviar');
Route::get('almacen/listar','IncidenciasController@listar');
Route::get('almacen/getIncidenciasEstado','IncidenciasController@getIncidenciasEstado')->name("getIncidenciasEstado");
Route::get('almacen/verIncidencia','IncidenciasController@ver')->name("verIncidencia");

Route::post('almacen/guardarIncidencia','IncidenciasController@guardar');
Route::post('almacen/editarEstado','IncidenciasController@editarEstado')->name("editarEstado");

Auth::routes();

Route::get('/home', 'HomeController@index');
