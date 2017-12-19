<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
	return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
	//dashboard
	Route::get('/', 'AdminController@index')->name('admin.dash');

	//auth
	Route::get('/login', 'AdminController@showLogin')->name('admin.login');
	Route::post('/login', 'AdminController@login')->name('admin.dologin');
	Route::post('/logout', 'AdminController@logout')->name('admin.logout');

	//users
	Route::get('/users', 'UserController@index')->name('admin.users'); // show index
	Route::get('/users/create', 'UserController@create')->name('admin.users.create'); // show create a new user
	Route::post('/users', 'UserController@store')->name('admin.users.store'); // save a new user
	Route::delete('/users/{user}', 'UserController@destroy')->name('admin.users.delete'); // delete an user
	Route::get('/users/edit/{user}', 'UserController@edit')->name('admin.users.edit'); // show edit form
	Route::post('/users/edit/{user}', 'UserController@update')->name('admin.users.update'); // update edited user
	Route::get('/users/{user}', 'UserController@show')->name('admin.users.show'); // show user profile
	Route::get('/users/log/{user}', 'UserController@showLog')->name('admin.users.log'); // show user log
	Route::get('/profile', 'UserController@showProfile')->name('admin.users.profile'); // show current user profile
	Route::get('/settings', 'UserController@showSettings')->name('admin.users.settings'); // show settings page
	Route::post('/settings', 'UserController@saveSettings')->name('admin.users.settings.save'); // save settings
	Route::post('/settings/password', 'UserController@updatePassword')->name('admin.users.settings.password.update'); // update password
	Route::get('/users/ajax/search', 'UserController@searchAJAX')->name('admin.users.search.ajax'); // search ajax

});

