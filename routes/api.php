<?php

use Illuminate\Http\Request;

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

Route::post('/carrito/eliminar', 'CarritoController@apiBorrar');
Route::get('/carrito/{user_id}', 'CarritoController@api');
Route::post('/carrito', 'CarritoController@apiStore');
Route::post('/cantidad', 'CarritoController@apiCantidad');
Route::post('/suscribe', 'SuscriberController@apiStore');
