<?php

namespace App\Http\Controllers;

use App\Owner;
use App\User;

class AdminController extends Controller
{
	public function __construct() {
		$this->middleware('admin')->except(['logout', 'login', 'showLogin']);
		$this->middleware('guest')->only('showLogin');
	}

	public function index(){
		$users = User::count();
		$owners = Owner::count();

		return view('admin.dash', compact(['users', 'owners']));
	}

	public function showLogin(){
		return view('admin.login');
	}

	public function login() {
		$this->validate(request(), [
			'nic' => 'required|string',
			'password' => 'required|string'
		]);

		if(!auth()->attempt(request(['nic', 'password'], request('remember'))) ){
			return redirect()->back()->withErrors([
				'message' => 'Credentials not match'
			]);
		}

		if (auth()->user()->type != 'admin'){
			auth()->logout();

			return redirect()->back()->withErrors([
				'message' => 'Credentials not match'
			]);
		}

		return redirect('/admin');
    }

    public function logout(){
    	auth()->logout();

    	return redirect('/admin/login');
    }
}
