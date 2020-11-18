<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Auth;

class VendorController extends Controller
{
    public function loginForm(){
        return view('vendor.login');
    }    

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('vendor')->attempt($credentials, $request->remember)) {
            $user = Vendor::where('email', $request->email)->first();
            Auth::guard('vendor')->login($user);
            return redirect()->route('vendor.home');
        }
        
        return redirect()->route('vendor.login')->with('status', 'Failed To Process Login');

    }

    public function dashboard(){
        return view('vendor.home');
    }

    public function logout(){
        if (Auth::guard('vendor')->logout()) {
            return redirect()->route('vendor.login')->with('status', 'Logout Successully!');
        }
    }
}
