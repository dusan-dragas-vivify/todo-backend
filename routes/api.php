<?php

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

Route::post('login', 'AuthController@authenticate');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('user', 'AuthController@getAuthenticatedUser');
    Route::get('logout', 'AuthController@logout');
    Route::get('tasks', 'TaskController@index');
    Route::post('tasks', 'TaskController@store');
});
