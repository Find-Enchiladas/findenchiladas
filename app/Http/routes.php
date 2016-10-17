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

Route::get('/', ['uses' => 'UserController@index']);
Route::get('/home', ['uses' => 'UserController@index']);
Route::get('/login', 'UserController@login');
Route::get('/signup', function() {
  return view('signup');
});
Route::get('/search', function() {
  return view('search');
});
Route::post('/search', 'FoodController@search');

Route::post('/signup', 'UserController@store');

// authenticated user actions
Route::get('/user', [ 'middleware' => 'auth', 'uses' => 'UserController@home']);
Route::post('/user/favorites', [ 'middleware' => 'auth', 'uses' => 'UserController@updateFavorites']);

Route::post('/login', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'auth.login']);
Route::post('/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'auth.logout']);

Route::post('/forgot', 'UserController@forgot');
Route::post('/phone', 'UserController@phone');

Route::get('/user/settings', 'UserController@settings');
Route::post('/user/settings/sms', 'UserController@sms');

Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
