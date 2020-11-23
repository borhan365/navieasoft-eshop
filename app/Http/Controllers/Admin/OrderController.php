<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\PaymentMethod;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();
        $methods = PaymentMethod::where('status', 1)->get();
        return view('backend.admin.order.index', compact('orders', 'methods'));
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

        return view('backend.admin.order.details', compact('order', 'orderDetails', 'toal_p_price','tax', 'shipping_charge', 'total'));
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

        return view('backend.admin.order.edit', compact('order', 'orderDetails'));
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
        return view('backend.admin.order.invoice_print', compact('order', 'orderDetails', 'toal_p_price','tax', 'shipping_charge', 'total'));
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
        $order = Order::findorfail($id);
        $order->status = $request->status;
        $order->save();
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
        $orders = Order::where(function($filter) use ($from_date, $to_date, $payment_method, $status) {
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
        return view('backend.admin.order.filter_order',compact('orders','from_date', 'to_date', 'payment_method', 'status', 'today_date', 'methods'));
   }


}
