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

Route::get('/'								, 'DashboardController@index');

//projects
Route::resource('projects'					, 'ProjectController');


Route::get('/processments/'					, 'ProcessmentController@index');
Route::get('/processments/configurations'	, 'ProcessmentController@configurations');


/**
 * UPLOAD METHODS
 * =============================
 * 
 */

Route::post('/form_direct_url/', 'ProcessmentController@form_direct_url');
