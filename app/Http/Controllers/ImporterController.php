<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Importer;
use App\Models\Vendor;
use Auth;

class ImporterController extends Controller
{
    public function loginForm(){
    	return view('importer.login');
    }    

    public function login(Request $request){
    	$credentials = $request->only('email', 'password');

    	if (Auth::guard('importer')->attempt($credentials, $request->remember)) {
    		$user = Importer::where('email', $request->email)->first();
    		Auth::guard('importer')->login($user);
    		return redirect()->route('importer.home');
    	}
    	
    	return redirect()->route('importer.login')->with('status', 'Failed To Process Login');

    }

    public function dashboard(){
        $vendors = Vendor::get();
    	return view('importer.home', compact('vendors'));
    }

    public function logout(){
        if (Auth::guard('importer')->logout()) {
            return redirect()->route('importer.login')->with('status', 'Logout Successully!');
        }
    }
}
