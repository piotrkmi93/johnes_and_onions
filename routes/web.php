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
    Route::get('/pub/{quest?}', 'QuestController@index') -> name('player.pub');
    Route::get('/options', 'OptionsController@index') -> name('player.options');

    Route::post('/options/password', 'OptionsController@password') -> name('player.options.password');
    Route::post('/options/name', 'OptionsController@name') -> name('player.options.name');
    Route::post('/options/description', 'OptionsController@description') -> name('player.options.description');

});


