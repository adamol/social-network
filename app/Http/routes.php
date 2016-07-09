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

Route::get('/', [
	'as' => 'home', 'uses' => 'HomeController@index'
]);
Route::get('/alert', function() {
	return Redirect::to('/')->with('info', 'Thanks for signing up!');
});
Route::get('/signup', [
	'as' => 'auth.signup', 'uses' => 'AuthController@getSignup'
]);
Route::post('/signup', 'AuthController@postSignup');

Route::get('/signin', [
	'as' => 'auth.signin', 'uses' => 'AuthController@getSignin'
]);
Route::post('/signin', 'AuthController@postSignin');

Route::get('/signout', [
	'as'=> 'auth.signout', 'uses' => 'AuthController@signout'
]);