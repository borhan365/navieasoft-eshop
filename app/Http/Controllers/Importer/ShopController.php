<?php

namespace App\Http\Controllers\Importer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_category;
use App\Models\Product_attribute;
use App\Models\Product_variation;
use App\Models\Vendor;
use App\Models\Shop;
use App\Models\Attribute;
use Auth;
use Session;
use DB;
use Cart;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;
        

        $products = Product::where('vendor_id', "!=", '')->simplepaginate(20);

        return view('backend.importer.shop.vendor_products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->product_id;
        $attribute_value = $request->attribute_value;
        $quantity = $request->quantity;

        $product_details = Product::where('products.id', $product_id)->first();

        $data = array();
        $data['id']=$product_details->id;
        $data['name']=$product_details->name;
        $data['price']=$product_details->sell_price;
        $data['qty']= $quantity;
        $data['weight']=$product_details->id;
        $data['options']['image']=$product_details->image;
        $data['options']['attribute_value']=$attribute_value;

        $cart = Cart::add($data);


        // echo "<pre>";
        // print_r($cart);
        // echo "</pre>";
         return view('backend.importer.shop.cart'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $attributes = Attribute::where('status', 1)->get();
        $product_images = Product_image::where('product_id', $id)->get();
        $product_categories = Product_category::where('product_id', $id)->get();
        $product_attributes = Product_attribute::where('product_id', $id)->get();
        $product_variations = Product_variation::where('product_id', $id)->get();
        $vendor = Vendor::where('id', $product->vendor_id)->first();
        $shop = Shop::where('owner_id', $vendor->id)->where('owner_type', 'vendor')->first();

        // $top_sell = Product::where('vendor_id', $product->vendor_id)->where('qty', 'asc')->first();
        // dd($top_sell);

        return view('backend.importer.shop.product_details', compact('product', 'product_images', 'product_categories', 'product_attributes', 'vendor', 'shop', 'attributes', 'product_variations', 'top_sell'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function remove_from_cart($rowId){
        Cart::remove($rowId);
        return view('backend.importer.shop.cart'); 
    }

    public function add_to_cart(Request $request){
        $product_id = $request->product_id;
        $attribute_value = $request->attribute_value;
        $quantity = $request->quantity;

        $product_details = Product::where('products.id', $product_id)->first();

        $data = array();
        $data['id']=$product_details->id;
        $data['name']=$product_details->name;
        $data['price']=$product_details->sell_price;
        $data['qty']= $quantity;
        $data['weight']=$product_details->id;
        $data['options']['image']=$product_details->image;
        $data['options']['attribute_value']=$attribute_value;

        $cart = Cart::add($data);


        // echo "<pre>";
        // print_r($cart);
        // echo "</pre>";
        return redirect()->back();
    }
    
    public function show_cart(){
        return view('backend.importer.shop.cart'); 
    }



}
