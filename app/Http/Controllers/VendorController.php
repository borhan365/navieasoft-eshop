<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Shop;
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

        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;
        $shop = Shop::where('owner_id', $user_id)->where('owner_type', $user_type)->first();
        $products = Product::where('user_id', $user_id)->where('user_type', $user_type)->count();

        return view('vendor.home', compact('products', 'user_id', 'user_type', 'shop'));
    }

    public function logout(){
        if (Auth::guard('vendor')->logout()) {
            return redirect()->route('vendor.login')->with('status', 'Logout Successully!');
        }
    }
}
