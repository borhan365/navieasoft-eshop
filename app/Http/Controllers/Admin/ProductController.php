<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Prosubcategory;
use App\Models\Color;
use App\Models\Size;
use App\Models\Product;
use App\Models\Product_size;
use App\Models\Product_color;
use App\Models\Product_image;
use App\Models\Product_category;
use App\Models\Product_attribute;
use App\Models\Attribute;
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
        $products = Product::get();
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
        $colors   = Color::where('status', 1)->get();
        $sizes   = Size::where('status', 1)->get();

        $attributes = Attribute::where('status', 1)->get();


        return view('backend.admin.product.create', compact('brands', 'categories', 'colors', 'sizes', 'attributes'));
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
        $product->slug = Str::slug($request->name);
        $product->brand_id = $request->brand_id;
        // $product->subcategory_id = $request->subcategory_id;
        // $product->prosubcategory_id = $request->prosubcategory_id;

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
        $product->note = $request->note;
        $product->status = $request->status;
        $product->save();

        $category_id= $request->category_id;
        if ($category_id) {
            foreach ($category_id as $key => $value ){
                $product_size = new Product_category();
                $product_size->product_id =$product->id;
                $product_size->category_id=$value;
                $product_size->save();
            }   
        }

        $attribute_id= $request->attribute_id;
        if ($attribute_id) {
            foreach ($attribute_id as $key => $value ){
                $product_size = new Product_attribute();
                $product_size->product_id =$product->id;
                $product_size->attribute_id=$value;
                $product_size->save();
            }   
        }

        $size_id = $request->size_id;
        if ($size_id) {
            foreach ($size_id as $key => $value ){
                $product_size = new Product_size();
                $product_size->product_id =$product->id;
                $product_size->size_id=$value;
                $product_size->save();
            }   
        }

        $color_id = $request->color_id;
        if ($color_id) {
            foreach ($color_id as $key => $value ){
                $product_color = new Product_color();
                $product_color->product_id =$product->id;
                $product_color->color_id=$value;
                $product_color->save();
            } 
        }

        $image = $request->file('product_image');
        if ($image) {
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
        $product = Product::findorfail($id);

        $brands = Brand::where('status', 1)->get();
        $categories  = Category::where('status', 1)->get();



        $colors   = Color::where('status', 1)->get();
        $sizes   = Size::where('status', 1)->get();

        $product_sizes = Product_size::where('product_id', $product->id)->get();
        $product_colors = Product_color::where('product_id', $product->id)->get();
        $product_categories = Product_category::where('product_id', $product->id)->get();
        $product_attributes = Product_attribute::where('product_id', $product->id)->get();
        $productImages= Product_image::where('product_id', $id)->get();
        return view('backend.admin.product.edit', compact('product', 'brands', 'categories', 'colors', 'sizes', 'product_sizes', 'product_colors', 'productImages', 'product_categories', 'product_attributes'));
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

        $product = Product::findorfail($id);
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;

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
                $old_image = $request->old_image;
                if (file_exists($old_image)) {
                    unlink($request->old_image);
                }
                
                $product->image = $image_url;
            }
        }

        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->note = $request->note;
        $product->status = $request->status;
        $product->save();

        $ProductCategory = Product_category::where('product_id', $id)->delete();
        $category_id = $request->category_id;
        if ($category_id) {
            foreach ($category_id as $key => $value ){
                $product_category = new Product_category();
                $product_category->product_id =$product->id;
                $product_category->category_id=$value;
                $product_category->save();
            }   
        }

        $ProductAttribute = Product_attribute::where('product_id', $id)->delete();
        $attribute_id = $request->attribute_id;
        if ($attribute_id) {
            foreach ($attribute_id as $key => $value ){
                $product_attribute = new Product_attribute();
                $product_attribute->product_id =$product->id;
                $product_attribute->attribute_id=$value;
                $product_attribute->save();
            }   
        }


        $ProductSize = Product_size::where('product_id', $id)->delete();
        $size_id = $request->size_id;
        if ($size_id) {
            foreach ($size_id as $key => $value ){
                $product_size = new Product_size();
                $product_size->product_id =$product->id;
                $product_size->size_id=$value;
                $product_size->save();
            }   
        }

        $ProductColor = Product_color::where('product_id', $id)->delete();
        $color_id = $request->color_id;
        if ($color_id) {
            foreach ($color_id as $key => $value ){
                $product_color = new Product_color();
                $product_color->product_id =$product->id;
                $product_color->color_id=$value;
                $product_color->save();
            } 
        }

        if ($request->product_image) {
            $ProductImage = Product_image::where('product_id', $id)->delete();        
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
                    // if ($request->old_product_image) {
                    //  unlink($request->old_product_image);
                    // }
                    $product_image->save();
                 }
            }
        }

        $notification=array(
            'message' => 'Product Updated Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagePath = Product::select('image')->where('id', $id)->first();
        $filePath = $imagePath->image;
        if (file_exists($filePath)) {
            unlink($filePath);
            Product::where('id', $id)->delete();
        }else{
            Product::where('id', $id)->delete();
        }
        $notification=array(
            'message' => 'Product Deleted Successfully !!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    public function get_prosubcategory(Request $request){
        $prosubcategories = Category::where('parent_id', $request->subcategory_id)->get();
        return view('backend.admin.product.get_prosubcategory',compact('prosubcategories'));
    }

}
