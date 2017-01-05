<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

//@overwrite
Route::get('/logout'							, 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/'								, 'DashboardController@index');
	Route::get('/users'							, 'UserController@index');
	Route::get('/users/create'					, 'UserController@add');
	Route::get('/users/edit/{id}'				, 'UserController@edit');
	Route::get('/users/profile/{id}'			, 'UserController@profile');
	Route::get('/users/config'					, 'UserController@config');

	//projects
	Route::resource('/projects'					, 'ProjectController@index');
	Route::resource('/projects/{id}'			, 'ProjectController@detail');

	Route::get('/processments'					, 'ProcessmentController@index');
	Route::get('/processments/config'			, 'ProcessmentController@config');
	
});



/**
 * UPLOAD METHODS
 * =============================
 * 
 */

Route::post('/form_direct_url/', 'ProcessmentController@form_direct_url');

