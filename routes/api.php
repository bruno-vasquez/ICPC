<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/evento','App\Http\Controllers\EventoController@index'); //para tener todos los registros y mostrarlos
Route::post('/evento','App\Http\Controllers\EventoController@store'); //crear un registro
Route::get('/evento/{id}','App\Http\Controllers\EventoController@show'); //para mostrarlos los registros
Route::put('/evento/{id}','App\Http\Controllers\EventoController@update'); //actualizar un registro
Route::delete('/evento/{id}','App\Http\Controllers\EventoController@destroy'); //borrar un registro