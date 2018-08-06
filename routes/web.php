<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/cep/{cep}', 'BuscaCEPController');

Route::get('/', 'ClienteController@create');

Route::post('/store', 'ClienteController@store');

Route::post('/show', 'HomeController@show');

Route::post('/resgatar', 'HomeController@resgatar');

Route::get('/exportar', 'HomeController@exportar');

Auth::routes();

Route::get('/admin', 'HomeController@index');
