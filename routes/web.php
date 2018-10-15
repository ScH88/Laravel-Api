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

//ROOT/INDEX PAGE
Route::get('/', 'PodcastController@index');
//SINGLE EPISODE PAGE
Route::get('/podcasts/{id}', 'PodcastController@show');
//Return all PodcastResources from the ApiController for testing
Route::get('testcollectall', 'ApiController@index');
