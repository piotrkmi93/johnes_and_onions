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

Route::post('quest/create', 'QuestController@create');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/player/get_look_variants', 'PlayerController@getCharacterLookVariants');

//Route::post('/player/create', 'PlayerController@create');
Route::post('/player/get', 'PlayerController@get');
//Route::post('/player/increment', 'PlayerController@increment');

Route::group(['middleware' => 'auth'], function(){

});