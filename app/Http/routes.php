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

Route::get('/', function () {
    return view('welcome');
});



Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('pdf', 'ConsultaController@exportpdf'); 



//articulo Routes
Route::group(['middleware'=> 'web'],function(){
  
  Route::resource('articulo','\App\Http\Controllers\ArticuloController');
  Route::post('articulo/{id}/update','\App\Http\Controllers\ArticuloController@update');
  Route::get('articulo/{id}/delete','\App\Http\Controllers\ArticuloController@destroy');
  Route::get('articulo/{id}/deleteMsg','\App\Http\Controllers\ArticuloController@DeleteMsg');
});

//departamento Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('departamento','\App\Http\Controllers\DepartamentoController');
  Route::post('departamento/{id}/update','\App\Http\Controllers\DepartamentoController@update');
  Route::get('departamento/{id}/delete','\App\Http\Controllers\DepartamentoController@destroy');
  Route::get('departamento/{id}/deleteMsg','\App\Http\Controllers\DepartamentoController@DeleteMsg');
});

//ingreso Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('ingreso','\App\Http\Controllers\IngresoController');
  Route::post('ingreso/{id}/update','\App\Http\Controllers\IngresoController@update');
  Route::get('ingreso/{id}/delete','\App\Http\Controllers\IngresoController@destroy');
  Route::get('ingreso/{id}/deleteMsg','\App\Http\Controllers\IngresoController@DeleteMsg');
});

//egreso Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('egreso','\App\Http\Controllers\EgresoController');
  Route::post('egreso/{id}/update','\App\Http\Controllers\EgresoController@update');
  Route::get('egreso/{id}/delete','\App\Http\Controllers\EgresoController@destroy');
  Route::get('egreso/{id}/deleteMsg','\App\Http\Controllers\EgresoController@DeleteMsg');
});
//Consulta Routes
Route::group(['middleware'=> 'web'],function(){
    Route::get('/consulta', '\App\Http\Controllers\ConsultaController@consulta');
    Route::resource('/buscar','\App\Http\Controllers\ConsultaController@buscar');
  //Route::post('consulta/{id}/update','\App\Http\Controllers\ConsultaController@update');
  Route::get('consulta/{id}/delete','\App\Http\Controllers\ConsultaController@destroy');
  Route::get('consulta/{id}/deleteMsg','\App\Http\Controllers\ConsultaController@DeleteMsg');
});

Route::group(['middleware'=> 'web'],function(){
});