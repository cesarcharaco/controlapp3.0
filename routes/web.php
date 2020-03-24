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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => ['web']], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('residentes','ResidentesController');
	Route::resource('mensualidades','MensualidadesController');
	Route::resource('inmuebles','InmueblesController');

	Route::resource('estacionamientos','EstacionamientosController');
	Route::get('estacionamientos/{id}/{anio}/buscar_mensualidad','EstacionamientosController@buscar_mensualidad');




	Route::resource('noticias', 'NoticiasController');
	Route::get('eliminarNoticia/{id}','NoticiasController@destroy')->name('eliminarNoticia');
	Route::resource('notificaciones','NotificacionesController');
	Route::get('eliminarNotificacion/{id}','NotificacionesController@destroy')->name('eliminarNotificacion');
});
