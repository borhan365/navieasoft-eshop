<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Merchant;
use App\Models\Message;
use Auth;
use Session;

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
        if (Auth::guard('vendor')) {
            session::flush();
            return redirect()->route('vendor.login')->with('status', 'Logout Successully!');
        }
    }

    public function merchants(){
        $merchants = Merchant::where('status', 1)->get();
        return view('backend.vendor.merchants.index', compact('merchants'));
    }

    public function merchant_profile($id){
        $merchant = Merchant::where('id', $id)->first();
        $total_product = Product::where('user_id', $id)->where('user_type', 'merchant')->count();
        return view('backend.vendor.merchants.merchant_profile', compact('merchant', 'total_product'));
    }

    public function send_message($id){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $merchant = Merchant::where('id', $id)->first();

        // $messages = Message::where('sender_id', $user_id)->where('recever_id', $id)->get();

        $messages = Message::where(function ($query) use ($user_id, $id) {
            $query->where('sender_id', $user_id)->where('recever_id', $id);
        })->oRwhere(function ($query) use ($user_id, $id) {
            $query->where('recever_id', $id)->where('sender_id', $id);
        })->get();

        return view('backend.vendor.merchants.send_message', compact('merchant', 'user_id', 'user_type', 'messages'));
    }

    public function message(Request $request){

        $sender_id = $request->input('sender_id');
        $sender_type = $request->input('sender_type');
        $recever_id = $request->input('recever_id');
        $recever_type = $request->input('recever_type');
        $text = $request->input('message');
        

        $message = new Message();
        $message->sender_id = $sender_id;
        $message->sender_type = $sender_type;
        $message->recever_id = $recever_id;
        $message->recever_type = $recever_type;
        $message->message = $text;
        $message->is_read = 0;
        $message->save();

        return response()->json($message);

        session()->flash('notif', "Successfully Done !! ");
        return redirect()->back();

    }



    public function show_message($id){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $messages = Message::where('recever_id', $user_id)->where('sender_id', $id)->get();

        return view('backend.vendor.merchants.show_message', compact('user_id', 'user_type', 'messages', 'user'));
    }



}
