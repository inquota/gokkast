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
 * Inloggen redirect
 */
Route::get('/', array('as' => 'login', 'uses' => 'HomeController@showIndex'));
Route::get('/user/login', array('as' => 'login', 'uses' => 'HomeController@showLogin'));
Route::post('/user/login', 'AuthenticationController@doLogin');

Route::get('/user/forgot-password', array('as'=> 'forgot-password', 'uses' => 'AuthenticationController@getForgotPassword'));
Route::post('/user/forgot-password', 'AuthenticationController@doForgotPassword');

/*
 * Filter to redirect not logged in users.
 */
Route::group(array('before' => "sentryAuth"), function () {

    /**
     * Dashboard
     */
    Route::get('/user/dashboard', array('as' => 'dashboard', 'uses' => 'HomeController@showWelcome'));

    /**
     * Standen
     */
    Route::get('/admin/standen/list/', array('as' => 'list-stand', 'uses' => 'StandenController@getAdminList'));
    Route::get('/admin/standen/new/', array('as' => 'new-stand', 'uses' => 'StandenController@getNew'));
    Route::get('/admin/standen/edit/{stand_id}', array('as' => 'edit-stand', 'uses' => 'StandenController@getAdminEdit'));
    Route::post('/admin/standen/edit/{stand_id}', 'StandenController@doEdit');
    Route::post('/admin/standen/new/', 'StandenController@doNew');

    /**
     * Machines
     */
    Route::get('/admin/machines/list/', array('as' => 'list-machine', 'uses' => 'MachinesController@getAdminList'));
    Route::get('/admin/machines/new/', array('as' => 'new-machine', 'uses' => 'MachinesController@getNew'));
    Route::get('/admin/machines/edit/{machine_id}', array('as' => 'edit-machine', 'uses' => 'MachinesController@getAdminEdit'));
    Route::post('/admin/machines/edit/{machine_id}', 'MachinesController@doEdit');
    Route::post('/admin/machines/new/', 'MachinesController@doNew');
});