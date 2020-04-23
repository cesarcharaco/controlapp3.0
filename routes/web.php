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

	Route::get('arriendos','ResidentesController@arriendos')->name('arriendos');
	Route::get('arriendos/{id_residente}/buscar_residente','ResidentesController@buscar_residente');
	Route::get('arriendos/{id_residente}/buscar_inmuebles','ResidentesController@buscar_inmuebles');
	Route::get('arriendos/{id_residente}/buscar_inmuebles2','ResidentesController@buscar_inmuebles2');
	Route::get('arriendos/{id_inmueble}/buscar_inmuebles3','ResidentesController@buscar_inmuebles3');
	Route::get('arriendos/{id_residente}/buscar_estacionamientos','ResidentesController@buscar_estacionamientos');
	Route::get('arriendos/{id_residente}/buscar_estacionamientos2','ResidentesController@buscar_estacionamientos2');
	Route::get('arriendos/{id_estacionamiento}/buscar_estacionamientos3','ResidentesController@buscar_estacionamientos3');
	Route::post('arriendos/asignando','ArriendosController@asignando')->name('arriendos.asignando');
	Route::resource('mensualidades','MensualidadesController');

	Route::resource('inmuebles','InmueblesController');
	Route::get('inmuebles/{id}/{anio}/buscar_mensualidad','InmueblesController@buscar_mensualidad');
	Route::get('inmuebles/{id}/buscar_anios', 'InmueblesController@buscar_anios');
	Route::post('inmuebles/registrar_mensualidad','InmueblesController@registrar_mensualidad')->name('inmuebles.registrar_mensualidad');
	Route::post('inmuebles/editar_mensualidad','InmueblesController@editar_mensualidad')->name('inmuebles.editar_mensualidad');
	Route::post('inmuebles/eliminar_mensualidad','InmueblesController@eliminar_mensualidad')->name('inmuebles.eliminar_mensualidad');



	Route::resource('estacionamientos','EstacionamientosController');
	Route::get('estacionamientos/{id}/{anio}/buscar_mensualidad','EstacionamientosController@buscar_mensualidad');
	Route::get('estacionamientos/{id}/buscar_anios', 'EstacionamientosController@buscar_anios');
	Route::post('estacionamientos/registrar_mensualidad','EstacionamientosController@registrar_mensualidad')->name('estacionamientos.registrar_mensualidad');
	Route::post('estacionamientos/editar_mensualidad','EstacionamientosController@editar_mensualidad')->name('estacionamientos.editar_mensualidad');
	Route::post('estacionamientos/eliminar_mensualidad','EstacionamientosController@eliminar_mensualidad')->name('estacionamientos.eliminar_mensualidad');
	

	Route::resource('noticias', 'NoticiasController');
	Route::get('eliminarNoticia/{id}','NoticiasController@destroy')->name('eliminarNoticia');
	Route::resource('notificaciones','NotificacionesController');
	Route::get('eliminarNotificacion/{id}','NotificacionesController@destroy')->name('eliminarNotificacion');

	Route::post('notificaciones/asignar','NotificacionesController@asignar_notif')->name('notificaciones.asignar_notif');
	Route::post('notificaciones/cambiar_status','NotificacionesController@status_notif')->name('notificaciones.status_notif');
	Route::post('notificaciones/eliminar','NotificacionesController@eliminar_notif')->name('notificaciones.eliminar_notif');

	Route::resource('multas_recargas','MultasRecargasController');
	Route::post('multas_recargas/asignar','MultasRecargasController@asignar_mr')->name('asignar_mr');
	Route::post('sanciones/cambiar_status','MultasRecargasController@status_mr')->name('sanciones.cambiar_status');
	Route::post('sanciones/eliminar','MensualidadesController@eliminar_mr')->name('sanciones.eliminar_mr');

	Route::resource('pagos','PagosController');
});
