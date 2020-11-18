<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use Auth;

class MerchantController extends Controller
{
    public function loginForm(){
        return view('merchant.login');
    }    

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('merchant')->attempt($credentials, $request->remember)) {
            $user = Merchant::where('email', $request->email)->first();
            Auth::guard('merchant')->login($user);
            return redirect()->route('merchant.home');
        }
        
        return redirect()->route('merchant.login')->with('status', 'Failed To Process Login');

    }

    public function dashboard(){
        return view('merchant.home');
    }

    public function logout(){
        if (Auth::guard('merchant')->logout()) {
            return redirect()->route('merchant.login')->with('status', 'Logout Successully!');
        }
    }
}
