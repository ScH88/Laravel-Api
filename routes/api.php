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

//LIST PODCASTS
Route::get('podcasts', 'ApiController@index');
//LIST SINGLE PODCAST
Route::get('podcast/{id}', 'ApiController@show');
//CREATE NEW PODCAST
Route::post('podcast', 'ApiController@store');
//UPDATE PODCAST
Route::put('podcast', 'ApiController@store');
//ALTERNATIVE UPDATE PODCAST
Route::put('podcast/{id}', 'ApiController@update');
//DELETE PODCAST
Route::delete('podcast/{id}', 'ApiController@destroy');
