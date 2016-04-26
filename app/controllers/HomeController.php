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
		return View::make('hello');
	}

	public function forecast()
	{
		return View::make('weather_map');
	}

	public function showResume()
	{
		return View::make('resume');
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}

	public function showLogIn()
	{
		if (Auth::check()) {
			return Redirect::action('PostsController@index');
		}
		return View::make('users.login');
	}
	public function doLogIn()
	{
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) 
		{
    		return Redirect::intended('/posts');
		
		} else {
    		
    		Session::flash('errorMessage', "Wrong eMail/password combination.");
    		return Redirect::back()->withInput();
		}
	}
	public function logOut()
	{
		Auth::logout();
		return Redirect::action('HomeController@showLogIn');
	}

}

