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
Route::post('/player/quest/delete', 'QuestController@delete'); // usuwa questy, uruchamiane po odbytej walce w queście

Route::post('/player/get', 'PlayerController@get');

/**
 * Inkrementuje podaną cechę gracza
 *
 * @param integer user_id
 * @param string attribute
 */
Route::post('/player/increment', 'PlayerController@increment');

/**
 * Ekwipuje postać w dany przedmiot
 *
 * @param integer user_id
 * @param integer backpack_item_id
 */
Route::post('/player/set', 'PlayerController@set');

/**
 * Ściąga przedmiot z postaci i wkłada go do plecaka
 *
 * @param integer user_id
 * @param integer item_id
 */
Route::post('/player/put', 'PlayerController@put');


// Shop async requests
Route::post('/shop/get', 'ShopController@get');
Route::post('/shop/buy', 'ShopController@buy');
Route::post('/shop/sell', 'ShopController@sell');

