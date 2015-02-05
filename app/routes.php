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
    Route::get('/admin/standen/save/{machine_id}', array('as' => 'new-stand', 'uses' => 'StandenController@getNew'));
    Route::get('/admin/standen/save/{machine_id}/{stand_id}', array('as' => 'edit-stand', 'uses' => 'StandenController@getAdminEdit'));
    Route::post('/admin/standen/save/{machine_id}/{stand_id}', 'StandenController@doSave');
    Route::post('/admin/standen/save/{machine_id}', 'StandenController@doSave');

    /**
     * Machines
     */
    Route::get('/admin/machines/list/', array('as' => 'list-machine', 'uses' => 'MachinesController@getAdminList'));
    Route::get('/admin/machines/save/{klant_id}', array('as' => 'edit-machine', 'uses' => 'MachinesController@getSave'));
	Route::get('/admin/machines/save/{klant_id}/{machine_id}', array('as' => 'edit-machine', 'uses' => 'MachinesController@getSave'));
    Route::get('/admin/machines/view/{machine_id}', array('as' => 'view-machine', 'uses' => 'MachinesController@getAdminView'));
    Route::post('/admin/machines/edit/{machine_id}', 'MachinesController@doSave');
    Route::post('/admin/machines/save/{klant_id}/{machine_id}', 'MachinesController@doSave');
	
	/**
     * Medewerkers
     */
    Route::get('/admin/medewerkers/list/', array('as' => 'list-medewerker', 'uses' => 'GebruikersController@getList'));

    Route::get('/admin/medewerkers/new/', array('as' => 'new-medewerker', 'uses' => 'GebruikersController@getSave'));
    Route::post('/admin/medewerkers/new/', 'GebruikersController@doSave');

    Route::get('/admin/medewerkers/edit/{medewerker_id}', array('as' => 'edit-medewerker', 'uses' => 'GebruikersController@getSave'));
    Route::post('/admin/medewerkers/edit/{medewerker_id}', 'GebruikersController@doSave');

    Route::get('/admin/medewerkers/delete/{medewerker_id}', array('as' => 'delete-medewerker', 'uses' => 'GebruikersController@getDelete'));

	
	/**
     * Klanten
     */
    Route::get('/admin/klanten/list/', array('as' => 'list-klant', 'uses' => 'KlantenController@getList'));
    Route::get('/admin/klanten/new/', array('as' => 'new-klant', 'uses' => 'KlantenController@getSave'));

    Route::get('/admin/klanten/edit/{klant_id}', array('as' => 'edit-klant', 'uses' => 'KlantenController@getSave'));
    Route::post('/admin/klanten/edit/{klant_id}', 'KlantenController@doSave');

    Route::post('/admin/klanten/new/', 'KlantenController@doSave');
    Route::get('/admin/klanten/delete/{klant_id}', array('as' => 'delete-klant', 'uses' => 'KlantenController@getDelete'));

	
	/**
     * Bonnen
     */
    Route::get('/admin/bonnen/list/', array('as' => 'list-bon', 'uses' => 'BonnenController@getAdminList'));
    Route::get('/admin/bonnen/new/{klant_id}', array('as' => 'new-bon', 'uses' => 'BonnenController@getNew'));
    Route::get('/admin/bonnen/edit/{bon_id}', array('as' => 'edit-bon', 'uses' => 'BonnenController@getAdminEdit'));
    Route::post('/admin/bonnen/edit/{bon_id}', 'BonnenController@doEdit');
    Route::post('/admin/bonnen/new/', 'BonnenController@doNew');
	
});