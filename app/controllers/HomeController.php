<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('admin.dashboard');
	}

    public function showIndex()
    {
        return ( ! Sentry::check()) ? Redirect::to('user/login') : Redirect::to('user/dashboard');
    }

    public function showLogin()
    {

        return ( ! Sentry::check()) ? View::make('home.login') : Redirect::to('/');
    }

}
