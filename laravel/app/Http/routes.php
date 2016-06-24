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

Route::get('/', 'IndexController@index');
Route::get('home', function() {
	return redirect('/');
});
Route::get('updates', 'IndexController@index');

// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Vehicles Routes...
Route::get('vehicles', 'VehiclesController@index');
Route::get('vehicles/create', 'VehiclesController@create');
Route::get('vehicles/{vin}', 'VehiclesController@edit');
Route::post('vehicles/create', 'VehiclesController@store');
Route::delete('vehicles/{vin}', 'VehiclesController@destroy');


// Users Routes...
/*Route::get('users', 'UsersController@index');
Route::get('users/create', 'UsersController@create');
Route::get('users/{id}', 'UsersController@edit');
Route::post('users/create', 'UsersController@store');
Route::post('users/{id}', 'UsersController@update');
Route::delete('users/{id}', 'UsersController@destroy');*/

// Application Routes...
/*Route::get('apps', 'ApplicationsController@index');
Route::get('apps/create', 'ApplicationsController@create');
Route::post('apps/newkey', 'ApplicationsController@app_key');
Route::get('apps/{id}', 'ApplicationsController@edit');
Route::post('apps/create', 'ApplicationsController@update');
Route::post('apps/{id}', 'ApplicationsController@update');
Route::delete('apps/{id}', 'ApplicationsController@destroy');*/


// Object Routes...
/*Route::get('objects', 'ObjectsController@index');
Route::get('objects/create', 'ObjectsController@create');
Route::get('objects/{id}', 'ObjectsController@edit');
Route::post('objects/create', 'ObjectsController@update');
Route::post('objects/{id}', 'ObjectsController@update');
Route::delete('objects/{id}', 'ObjectsController@destroy');*/

// API Routes...
/*Route::get('api/{resource}', 'APIController@getResource');
Route::get('api/{resource}/{id}', 'APIController@getResource');
Route::put('api/{resource}/{id}', 'APIController@updateResource');
Route::post('api/{resource}', 'APIController@createResource');
Route::delete('api/{resource}/{id}', 'APIController@destroyResource');
Route::post('api/token', 'APIController@oauthToken');
Route::post('api/me', 'APIController@oauthMe');*/