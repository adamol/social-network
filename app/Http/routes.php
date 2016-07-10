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
Route::get('/user/{username}', [
	'as' => 'profile.index', 'uses' => 'ProfileController@index'
]);


Route::group(['middleware' => 'guest'], function() {

	Route::get('/signup', [
		'as' => 'auth.signup', 'uses' => 'AuthController@getSignup'
	]);
	Route::post('/signup', 'AuthController@postSignup');

	Route::get('/signin', [
		'as' => 'auth.signin', 'uses' => 'AuthController@getSignin'
	]);
	Route::post('/signin', 'AuthController@postSignin');

});

Route::group(['middleware' => 'auth'], function() {
	Route::get('/signout', [
		'as'=> 'auth.signout', 'uses' => 'AuthController@signout'
	]);

	Route::get('/search', [
		'as'=> 'search.results', 'uses' => 'SearchController@getResults'
	]);

	Route::get('/profile/edit', [
		'as'=> 'profile.edit', 'uses' => 'ProfileController@getEdit'
	]);
	Route::post('/profile/edit', 'ProfileController@postEdit');

	Route::get('/friends', [
		'as'=> 'friends.index', 'uses' => 'FriendController@index'
	]);

	Route::get('/friends/add/{username}', [
		'as'=> 'friends.add', 'uses' => 'FriendController@add'
	]);

	Route::get('/friends/accept/{username}', [
		'as'=> 'friends.accept', 'uses' => 'FriendController@accept'
	]);

	Route::post('/status', [
		'as' => 'status.post', 'uses' => 'StatusController@post'
	]);

	Route::post('/status/{statusId}/reply', [
		'as' => 'status.reply', 'uses' => 'StatusController@reply'
	]);

	Route::get('/status/{statusId}/like', [
		'as'=> 'status.like', 'uses' => 'StatusController@getLike'
	]);
});