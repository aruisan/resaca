<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//rutas generales
Route::get('/', function(){
	return view('auth.login');
});
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'UserController@login']);


//rutas para cualquier logueado
Route::group(['middleware' => 'auth'], function(){
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::resource('misElementos', 'UserReservaElementosController');
Route::resource('misSalas', 'UserReservaSalasController');
});

//rutas para el logueado admin
Route::group(['middleware' => ['auth', 'administrador']], function(){
	//ruta de crud salas
	 Route::resource('salas', 'salasController');
	 //ruta de crud salas
	 Route::resource('users', 'UserController');
	//ruta de crud elementos
	 Route::resource('elementos', 'elementosController');
	//ruta de crud tipo_elementos
	 Route::resource('tipo_elementos', 'tipoElementosController');
	//ruta de crud elemntos en la sala
	 Route::resource('elementos_salas','elementos_salasController');
	 Route::get('ver/elementos/{id}', array('as' => 'ver/elementos', 'uses' => 'elementos_salasController@ver'));

	//ruta de crud reservas de salas
	 Route::resource('reservaSalas','reservaSalasController');
	 Route::get('confirmarSala/{id}', 'reservaSalasController@confirmar');
	 Route::get('reservaSalas/buscar/{usuario}', 'reservaSalasController@buscar');
	 Route::get('admin/reservaSalas/{id}', 'reservaSalasController@Misreservas');
	 Route::resource('miReservaSalas', 'reservaSalasController@misReservas');


	//ruta de crud reservas de elementos
	 Route::resource('reservaElementos','reservaElementosController');
	 Route::get('confirmarElemento/{id}', 'reservaElementosController@confirmar');
	 Route::get('reservaElementos/buscar/{usuario}', 'reservaSalasController@buscar');
	 Route::get('admin/reservaElementos/{id}', 'reservaElementosController@Misreservas');
	 Route::resource('mireservaElementos', 'reservaElementosController@misReservas');

	 Route::resource('reportes', 'ReportesController');
	 Route::get('/reportes/salas/ff_inicio/{ff_inicio}/ff_final/{ff_final}/estado/{estado}/salas/{salas}', 'ReportesController@graficosSalas');
	 Route::get('/reportes/elementos/ff_inicio/{ff_inicio}/ff_final/{ff_final}/estado/{estado}/elementos/{elementos}', 'ReportesController@graficosElementos');
});
 






 /*
Route::get('resaca', 'ResacaAuthController@index');
Route::post('resaca/auth', 'ResacaAuthController@auth');
Route::get('resaca/callback', 'ResacaAuthController@callback');
Route::get('resaca/done', 'ResacaAuthController@done');
Route::post('resaca/revoke', 'ResacaAuthController@revoke');*/








 
 
 /*Route::get('horas', 'reservasController@DiferenciasHoras');*/
