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

Route::get('/Eventos','App\Http\Controllers\EventosController@index'); //para tener todos los registros y mostrarlos
Route::post('/Eventos','App\Http\Controllers\EventosController@store'); //crear un registro
Route::get('/Eventos/{id}','App\Http\Controllers\EventosController@show'); //para mostrarlos los registros
Route::put('/Eventos/{id}','App\Http\Controllers\EventosController@update'); //actualizar un registro
Route::delete('/Eventos/{id}','App\Http\Controllers\EventosController@destroy'); //borrar un registro