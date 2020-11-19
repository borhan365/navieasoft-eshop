<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Prosubcategory;
use App\Models\Color;
use App\Models\Size;
use App\Models\Product;
use App\Models\Product_size;
use App\Models\Product_color;
use App\Models\Product_image;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::simplepaginate(20);
        return view('backend.admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('status', 1)->get();
        $categories  = Category::where('status', 1)->get();
        $prosubcategories   = Prosubcategory::where('status', 1)->get();
        $colors   = Color::where('status', 1)->get();
        $sizes   = Size::where('status', 1)->get();
        return view('backend.admin.product.create', compact('brands', 'categories', 'prosubcategories', 'colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->prosubcategory_id = $request->prosubcategory_id;

        $product->buying_price = $request->buying_price;
        $product->market_price = $request->market_price;
        $product->sell_price = $request->sell_price;

        $image = $request->file('image');
        if($image)
        {
            $image_name=str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' .$ext;
            $upload_path = 'images/product_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $product->image = $image_url;
            }
        }

        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->note = $request->description;
        $product->status = $request->status;
        $product->save();

        $size_id = $request->size_id;
        foreach ($size_id as $key => $value ){
            $product_size = new Product_size();
            $product_size->product_id =$product->id;
            $product_size->size_id=$value;
            $product_size->save();
        }   

        $color_id = $request->color_id;
        foreach ($color_id as $key => $value ){
            $product_color = new Product_color();
            $product_color->product_id =$product->id;
            $product_color->color_id=$value;
            $product_color->save();
        } 

        $image = $request->file('product_image');
        if($image){
            foreach ($image as $value ){
                $product_image = new Product_image();
                $image_name=str::random(5);
                $ext = strtolower($value->getClientOriginalExtension());
                $image_full_name = $image_name. '.' .$ext;
                $upload_path = 'images/product_more_image/';
                $image_url = $upload_path.$image_full_name;
                $success = $value->move($upload_path, $image_full_name);
                $product_image->product_id = $product->id;
                $product_image->product_image = $image_url;
                $product_image->save();
            }
        }

        $notification=array(
            'message' => 'Product Saved Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);
        $product->delete();
        $notification=array(
            'message' => 'Product Deleted Successfully !!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function get_prosubcategory(Request $request){
        $prosubcategories = Prosubcategory::where('subcategory_id', $request->subcategory_id)->get();
        return view('backend.admin.product.get_prosubcategory',compact('prosubcategories'));
    }

}
