<?php


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

});
/** DROPZONE */
Route::group([
    'middleware' => 'api',
    'prefix' => 'dropzone'
], function () {

    Route::group(['prefix' => 'upload'], function () {
        Route::resource('image', 'Dropzone\ImageController', ['only' => ['store']]);
        // Route::resource('audio', 'ResourceController@uploadAudio');
    });

});
/** RECIPES */

Route::group([
    'middleware' => 'api',
    'prefix' => 'cooking'
], function () {
    Route::get('recipe/{id}', 'Cooking\RecipeController@getById');
    Route::get('recipe/foodcategory/{food_category_id}', 'Cooking\RecipeController@getByCategory');
    Route::post('recipe', 'Cooking\RecipeController@store');
});