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

Route::get('/', 'UserController@index');
Route::get('/login', 'UserController@index');
Route::get('/signup', function() {
  return view('signup');
});
Route::get('/search', function() {
  return view('search');
});
Route::post('/search', 'FoodController@search');

Route::post('/signup', 'UserController@store');

Route::get('/user', 'UserController@showFav');
Route::post('/user', 'UserController@storeFav');
Route::patch('/user/favorite/{id}', ['as' => 'favorite.delete', 'uses' => 'UserController@deleteFavorite']);

Route::post('/login', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'auth.login']);
Route::get('/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'auth.logout']);
Route::post('/forgot', 'UserController@forgot');
Route::post('/phone', 'UserController@phone');

Route::get('/menu', 'FoodController@scrape5CMenu');

Route::get('/message', 'MessageController@sendMessage');
