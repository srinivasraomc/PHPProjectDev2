<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('about', 'PagesController@index');
Route::get('articles', 'ArtclesController@index');

//Route::get('articles/create', 'ArtclesController@create');
//Route::get('articles/{id}', 'ArtclesController@show');
//Route::post('articles', 'ArtclesController@store');
Route::resource('articles','ArtclesController');
