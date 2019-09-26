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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes Group Users
Route::group(['prefix' => 'users', 'namespace' => 'Api'], function(){
    // Method users
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');

    // Method travels for users
    Route::post('/{userId}/travels/list', 'TravelController@index');
    Route::post('/{userId}/travels', 'TravelController@store');
});

Route::group(['prefix' => 'travels', 'namespace' => 'Api'], function(){
    Route::post('/', 'TravelController@index');
    Route::get('/{id}', 'TravelController@show');
    Route::delete('/{id}', 'TravelController@destroy');
});
