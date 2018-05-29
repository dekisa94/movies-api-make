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
//Public endpoint
Route::post('/login', 'Auth\LoginController@authenticate');
Route::post('/register', 'Auth\RegisterController@store');

//Private endpoint
Route::middleware('jwt')->get('/movies', 'MoviesController@index');
Route::middleware('jwt')->post('/movies', 'MoviesController@store');
Route::middleware('jwt')->get('/movies/{id}', 'MoviesController@show');
Route::middleware('jwt')->put('/movies/{id}', 'MoviesController@update');
Route::middleware('jwt')->delete('/movies/{id}', 'MoviesController@destroy');
