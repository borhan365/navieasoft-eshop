@extends('layouts.admin.app')

@section('content')




    <section class="content mt-5">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Customer Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control"  value='{{$order->customer->first_name." ".$order->customer->last_name}}' readonly="">
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control" value="{{$order->customer->email}}" readonly="">
                  </div>
                  <div class="form-group">
                    <label >Phone</label>
                    <input type="text" class="form-control" value="{{$order->customer->phone}}" readonly="">
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->


          <div class="col-md-6">
            <!-- general form elements -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Shipping Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin/update-shipping-address', [$order->id])}}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="shipping_address" class="form-control" id="" rows="2">{{$order->shipping_address ?? ''}}</textarea>
                  </div>
	                  	
                  <div class="form-group">
                    <label >City</label>
                    <input name="city" type="text" class="form-control" value="{{$order->city}}">
                  </div>

                  <div class="form-group">
                    <label >Post Code</label>
                    <input name="postcode" type="text" class="form-control" value="{{$order->postcode}}">
                  </div>
                  <div class="form-group">
                    <label >Country</label>
                    <input name="country" type="text" class="form-control" value="{{$order->country}}">
                  </div>
                  	
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

          <div class="col-md-6">
            <!-- general form elements -->

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Order Summery</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin/update-order-summery', [$order->id])}}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Total QTY</label>
                    <input name="total_qty" type="text" class="form-control" value="{{$order->total_qty}}" readonly="">
                  </div>
                  <div class="form-group">
                    <label >Total Cost</label>
                    <input name="total_cost" type="text" class="form-control" value="{{$order->total_cost}}" readonly="">
                  </div>
                  <div class="form-group">
                    <label>Delivery Method</label>
                    <input name="payment_method" type="text" class="form-control" value="{{$order->paymentmethod->name}}" readonly="">
                  </div>                  
                  <div class="form-group">
                    <label >Status</label>
                    <select name="status" id="" class="form-control">
                    	<option value="0" @php echo $order->status==0?"selected":""; @endphp>Pending</option>
                    	<option value="1" @php echo $order->status==1?"selected":""; @endphp>Processing</option>
                    	<option value="2" @php echo $order->status==2?"selected":""; @endphp>Approved</option>
                    	<option value="3" @php echo $order->status==3?"selected":""; @endphp>Canceled</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Order Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Products</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Text Disabled</label>
                        <input type="text" class="form-control" placeholder="Enter ..." disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Textarea Disabled</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." disabled></textarea>
                      </div>
                    </div>
                  </div>

                  </div>

                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->





@endsection