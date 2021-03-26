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

Route::prefix('geografia')->middleware(['auth', 'get.menu'])->group(function() {

    Route::get('/estado', 'EstadoController@index');
    Route::post('/estado/datatable', 'EstadoController@datatable');
    
    Route::get('/cidade', 'CidadeController@index');
    Route::post('/cidade/datatable', 'CidadeController@datatable');

});
