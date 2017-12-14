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
	$locations = [
		['lat' => 7.234, 'lng' => 78.2345555, 'created_at' => '2017-08-10', 'note' => 'some'],
		['lat' => 7.234, 'lng' => 50.2345555, 'created_at' => '2017-06-10', 'note' => 'some note'],
	];
	$locations = json_encode($locations);
	return view('welcome')->with('locations', $locations);
});
Route::get('/admin', function () {
	return view('admin.master');
});

Route::get('admin/create/user', function () {
	return view('admin.add-user');
});
//temp
Route::get('admin/create/owner', function () {
	return view('admin.add-owner');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
