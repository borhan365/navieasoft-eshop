<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class AdminController extends Controller
{
    public function loginForm(){
    	return view('admin.login');
    }    

    public function login(Request $request){
    	$credentials = $request->only('email', 'password');

    	if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
    		$user = Admin::where('email', $request->email)->first();
    		Auth::guard('admin')->login($user);
    		return redirect()->route('admin.home');
    	}
    	
    	return redirect()->route('admin.login')->with('status', 'Failed To Process Login');

    }

    public function dashboard(){
    	return view('admin.home');
    }

    public function logout(){
        if (Auth::guard('admin')->logout()) {
            return redirect()->route('admin.login')->with('status', 'Logout Successully!');
        }
    }
}
