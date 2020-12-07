<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Shop;
use App\Models\OrderDetails;
use App\Models\Product;
use Auth;

class OrderController extends Controller
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

        $methods = PaymentMethod::where('status', 1)->get();
        $shop = Shop::where('owner_id', $user_id)->where('owner_type', $user_type)->first();
        $orders = Order::where('shop_id', $shop->id)->get();

        return view('backend.merchant.order.index', compact('orders', 'methods'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findorfail($id);
        $orderDetails = OrderDetails::where('order_id', $id)->get();

        $toal_p_price = OrderDetails::where('order_id', $id)->sum('product_price');
        $tax = 10;
        $shipping_charge = 100;

        $total = $toal_p_price + $tax + $shipping_charge;

        return view('backend.merchant.order.details', compact('order', 'orderDetails', 'toal_p_price','tax', 'shipping_charge', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findorfail($id);
        $orderDetails = OrderDetails::where('order_id', $id)->get();

        return view('backend.merchant.order.edit', compact('order', 'orderDetails'));
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

    public function invoice_print($id){
        $order = Order::findorfail($id);
        $orderDetails = OrderDetails::where('order_id', $id)->get();
        $toal_p_price = OrderDetails::where('order_id', $id)->sum('product_price');
        $tax = 10;
        $shipping_charge = 100;
        $total = $toal_p_price + $tax + $shipping_charge;
        return view('backend.merchant.order.invoice_print', compact('order', 'orderDetails', 'toal_p_price','tax', 'shipping_charge', 'total'));
    }

    public function update_shipping_address(Request $request, $id){
        $order = Order::findorfail($id);
        $order->shipping_address = $request->shipping_address;
        $order->city = $request->city;
        $order->postcode = $request->postcode;
        $order->country = $request->country;
        $order->save();
        $notification=array(
            'message' => 'Shipping Address Updated Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update_order_summery(Request $request, $id){

        $order_summery = Order::findorfail($id);
        if ($order_summery->status == 2) {
            $notification=array(
                'message' => 'Order Completed Already!',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }

        $order_summery->status = $request->status;
        $order_summery->save();

        if ($request->status == 2) {
            $product_id = $request->product_id;
            $product_sales_qty = $request->qty;
            foreach ($product_id as $key => $value) {
                $a = Product::where('id', $value)->first();
                $b = $product_sales_qty[$key];
                $available_stock = $a->qty-$b;
                $t_s = $a->total_sell;
                $total_sell = $t_s+$b;
                $total_product = $available_stock+$total_sell;
                $product_id = $value;
                $data = array();
                $data['qty'] = $available_stock;
                $data['total_sell'] = $total_sell;
                $data['total_product'] = $total_product;
                Product::where('id', $value)->update($data);
            }
        }


        $notification=array(
            'message' => 'Order Updated Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

   public function filter_order(Request $request){
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $payment_method = $request->payment_method;
        $status = $request->status;

        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $shop = Shop::where('owner_id', $user_id)->where('owner_type', $user_type)->first();
        
        $orders = Order::where('shop_id', $shop->id)->where(function($filter) use ($from_date, $to_date, $payment_method, $status) {
                       if (!empty($from_date) || $from_date != '') {
                           $filter->where('created_at', '>=' , $from_date);
                       }
                       if (!empty($to_date) || $to_date != '') {
                           $filter->where('created_at', '<=' , $to_date);
                       }                       
                       if (!empty($payment_method) || $payment_method != '') {
                           $filter->where('payment_method', $payment_method);
                       }                       
                       if (!empty($status) || $status != '') {
                           $filter->where('status', $status);
                       }
                   })
                ->paginate(20);

        $methods = PaymentMethod::where('status', 1)->get();

        $today_date = date('Y-m-d');
        return view('backend.merchant.order.filter_order',compact('orders','from_date', 'to_date', 'payment_method', 'status', 'today_date', 'methods'));
   }


}