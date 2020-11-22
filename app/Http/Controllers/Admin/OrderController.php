<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;


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
        return view('backend.admin.order.index', compact('orders'));
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

}
