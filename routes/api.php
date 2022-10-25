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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/clients', 'App\Http\Controllers\ClientsController@index');//mostrar todos los registros
Route::get('/clients/{id}', 'App\Http\Controllers\ClientsController@show');//mostrar todos los registros
Route::post('/clients', 'App\Http\Controllers\ClientsController@store'); //crear un registro
Route::put('/clients/{id}', 'App\Http\Controllers\ClientsController@update');
Route::delete('/clients/{id}', 'App\Http\Controllers\ClientsController@destroy');

Route::get('/payments', 'App\Http\Controllers\PaymentsController@index');//mostrar todos los registros
Route::get('/payments/{id}', 'App\Http\Controllers\PaymentsController@show');//mostrar todos los registros
Route::post('/payments', 'App\Http\Controllers\PaymentsController@store'); //crear un registro
Route::put('/payments/{id}', 'App\Http\Controllers\PaymentsController@update');
Route::delete('/payments/{id}', 'App\Http\Controllers\PaymentsController@destroy');
