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

$routes = function() {
    Route::get('/', 'CharactersController@status_validate')->name('status_validate');

    Route::prefix('characters/')->group(function() {
        Route::get('{id?}{page?}', 'CharactersController@getCharacters')->name('get_characters');
        Route::post('', 'CharactersController@doCreate')->name('get_characters_create');
        Route::patch('', 'CharactersController@updateData')->name('get_characters_save');
        Route::delete('{id}', 'CharactersController@deleteData')->name('get_characters_delete');
    });

};

Route::group([], $routes);

Route::fallback(function(){
    return response("404: page not found", 404);
});

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
