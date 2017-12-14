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
Route::get('/admin', function (){
	return view('admin.master');
});

Route::get('/admin/login', function (){
	return view('admin.login');
});


Route::get('admin/create/user', function (){
	return view('admin.add-user');
});
//temp
Route::get('admin/create/owner', function (){
    return view('admin.add-owner');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


