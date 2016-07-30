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

// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


// API Routes...
Route::post('api/location/store', 'LocationsController@store');
Route::post('devices/{id}/pair', 'DevicesController@pair');
Route::post('devices/{id}/unpair', 'DevicesController@unpair');
Route::post('devices/{id}/active', 'DevicesController@active');	

Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/', 'IndexController@index');
	Route::get('home', function() {
		return redirect('/');
	});
	Route::get('updates', 'IndexController@index');
	
	// Vehicles Routes...
	Route::get('vehicles', 'VehiclesController@index');
	Route::get('vehicles/create', 'VehiclesController@create');
	Route::get('vehicles/{id}', 'VehiclesController@edit');
	Route::post('vehicles/create', 'VehiclesController@store');
	Route::post('vehicles/{id}', 'VehiclesController@update');
	Route::delete('vehicles/{id}', 'VehiclesController@destroy');
	
	// Devices Routes...
	Route::get('devices', 'DevicesController@index');
	Route::get('devices/create', 'DevicesController@create');
	Route::get('devices/{id}', 'DevicesController@edit');
	Route::get('devices/{id}/pair', 'DevicesController@show');
	Route::post('devices/create', 'DevicesController@store');
	Route::post('devices/{id}', 'DevicesController@update');
	Route::delete('devices/{id}', 'DevicesController@destroy');

});
	