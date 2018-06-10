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

Route::get('api/v1/usuario/getAll','UsuarioController@getUsuarios');
Route::get('api/v1/usuario/getAllFull','UsuarioController@getUsuariosFull');
Route::get('api/v1/usuario2','UsuarioController@getUsuarios2');
Route::get('api/v1/usuario/get/{id}','UsuarioController@getUsuario');
Route::post('api/v1/usuario/create','UsuarioController@createUsuario');
