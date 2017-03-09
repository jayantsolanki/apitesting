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

Route::get('/', function () {
    return view('welcome');
});
Route::any('/login', [
	'as' => 'login',
	'uses' => 'Auth\AuthenticateController@login'
	/*function(){
		return view('register/login');
	}*/
]);
Route::POST('auth/user_login',[
	'as' => 'user_login',
	'uses' => 'Auth\AuthenticateController@authenticate'
]);
Route::GET('/logout',[
	'middleware' => 'jwt-refresh',
	'as' => 'logout',
	'uses' => 'Auth\AuthenticateController@logout'
]);
Route::any('register/forgotpass',[
	'as' => 'forgotpass',
	function(){
		return view('register/forgotpass');
	}
]);

Route::get('/showUser',[
	'middleware' => 'jwt-auth',
	'as' => 'showUser',
	'uses' => 'UserController@show'
]);