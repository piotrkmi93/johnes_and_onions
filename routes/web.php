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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('/', 'PlayerController@index');
    Route::post('player/create', 'PlayerController@create')->name('player.create');

    // TODO make middleware for playables
    Route::get('/character', 'PlayerController@character') -> name('player.character');
    
});


