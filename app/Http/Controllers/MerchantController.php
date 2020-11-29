<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Vendor;
use App\Models\Product;
use Auth;
use Session;

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
        if (Auth::guard('merchant')) {
            session::flush();
            return redirect()->route('merchant.login')->with('status', 'Logout Successully!');
        }
    }

    public function vendors(){
        $vendors = Vendor::where('status', 1)->get();
        return view('backend.merchant.vendors.index', compact('vendors'));
    }

    public function vendor_profile($id){
        $vendor = Vendor::where('id', $id)->first();
        $total_product = Product::where('user_id', $id)->where('user_type', 'vendor')->count();
        return view('backend.merchant.vendors.vendor_profile', compact('vendor', 'total_product'));
    }

    public function send_message($id){
        $vendor = Vendor::where('id', $id)->first();
        return view('backend.merchant.vendors.send_message', compact('vendor'));
    }
}
