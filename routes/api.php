<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminsController;
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
Route::match(['post', 'put'], '/Eventos/{id}', 'App\Http\Controllers\EventosController@update');

Route::get('/TipoEventos','App\Http\Controllers\TipoEventosController@index'); //para tener todos los registros y mostrarlos
Route::post('/TipoEventos','App\Http\Controllers\TipoEventosController@store'); //para tener todos los registros y mostrarlos
Route::delete('/TipoEventos/{id}','App\Http\Controllers\TipoEventosController@destroy'); //borrar un registro
Route::put('/TipoEventos/{id}','App\Http\Controllers\TipoEventosController@update'); //actualizar un registro

Route::get('/TipoCompetencias','App\Http\Controllers\TipoCompetenciasController@index'); //para tener todos los registros y mostrarlos
Route::post('/TipoCompetencias','App\Http\Controllers\TipoCompetenciasController@store'); //para tener todos los registros y mostrarlos
Route::delete('/TipoCompetencias/{id}','App\Http\Controllers\TipoCompetenciasController@destroy'); //borrar un registro
Route::put('/TipoCompetencias/{id}','App\Http\Controllers\TipoCompetenciasController@update'); //actualizar un registro

Route::get('/Competencias','App\Http\Controllers\CompetenciasController@index'); //para tener todos los registros y mostrarlos
Route::post('/Competencias','App\Http\Controllers\CompetenciasController@store'); //crear un registro
Route::get('/Competencias/{id}','App\Http\Controllers\CompetenciasController@show'); //para mostrarlos los registros
Route::put('/Competencias/{id}','App\Http\Controllers\CompetenciasController@update'); //actualizar un registro
Route::delete('/Competencias/{id}','App\Http\Controllers\CompetenciasController@destroy'); //borrar un registro
Route::match(['post', 'put'], '/Competencias/{id}', 'App\Http\Controllers\CompetenciasController@update');

Route::get('/Usuarios','App\Http\Controllers\UsuariosController@index'); //para tener todos los registros y mostrarlos
Route::post('/Usuarios','App\Http\Controllers\UsuariosController@store'); //crear un registro
Route::get('/Usuarios/{id}','App\Http\Controllers\UsuariosController@show'); //para mostrarlos los registros
Route::put('/Usuarios/{id}','App\Http\Controllers\UsuariosController@update'); //actualizar un registro
Route::delete('/Usuarios/{id}','App\Http\Controllers\UsuariosController@destroy'); //borrar un registro

Route::post('/Admins/login', [AdminsController::class, 'login']);
Route::post('/Admins/logout', [AdminsController::class, 'logout']);
Route::get('/Admins','App\Http\Controllers\Auth\AdminsController@index'); //para tener todos los registros y mostrarlos
Route::post('/Admins/register', [AdminsController::class, 'register']);

