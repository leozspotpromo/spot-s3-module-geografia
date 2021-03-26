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

// Route::middleware('auth:api')->get('/geografia', function (Request $request) {

//     Route::get('estado', 'Api\EstadoController@index');

//     return $request->user();
// });

Route::prefix('geografia')->middleware([])->group(function() {

    Route::get('estado', 'Api\\EstadoController@index');
    Route::get('estado/{estado}', 'Api\\EstadoController@show');

});
