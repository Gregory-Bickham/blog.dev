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


Route::get('/sayhello/{name}', function($name)
{
    return "Hello, $name!";
});

Route::get('/forecast', 'HomeController@forecast');

Route::get('/resume', 'HomeController@showResume');

Route::get('/portfolio', 'HomeController@showPortfolio');

Route::resource('posts', 'PostsController');

Route::get('orm-test', function ()
{
    $posts = Post::all();
	return $posts;
});



