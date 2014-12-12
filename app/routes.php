<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/**
 * Standen
 */
Route::get('/admin/standen/list/', array('as' => 'list-stand', 'uses' => 'StandenController@getAdminList'));
Route::get('/admin/standen/new/', array('as' => 'new-stand', 'uses' => 'StandenController@getNew'));
Route::get('/admin/standen/edit/{stand_id}', array('as' => 'edit-stand', 'uses' => 'StandenController@getAdminEdit'));
Route::post('/admin/standen/edit/{stand_id}', 'StandenController@doEdit');
Route::post('/admin/standen/new/', 'StandenController@doNew');


Route::get('/', function()
{
	return View::make('admin.dashboard');
});
