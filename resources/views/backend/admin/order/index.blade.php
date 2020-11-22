@extends('layouts.admin.app')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Order By</th>
                  <th>Quantity</th>
                  <th>Total Cost</th>
                  <th>Payment Method</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @php $i=1 @endphp
            @foreach($orders as $order)
                <tr>
                  	<td>{{$i++}}</td>
                    <td>{{$order->customer->first_name." ".$order->customer->last_name }}</td>
                    <td>{{$order->total_qty}}</td>
                    <td>{{$order->total_cost}} BDT</td>
                    <td>{{$order->paymentmethod->name}}</td>

	                <td>
	                    @php
	                        if($order->status == 0){
	                           echo  "<div class='badge badge-warning badge-shadow'>Pending</div>";
	                         }
                           if($order->status == 1){
	                           echo  "<div class='badge badge-info badge-shadow'>Processing</div>";
	                         }
                           if($order->status == 2){
                             echo  "<div class='badge badge-success badge-shadow'>Approved</div>";
                           }
                           if($order->status == 3){
                             echo  "<div class='badge badge-danger badge-shadow'>Canceled</div>";
                           }
	                    @endphp
                      
	                </td>
                  	<td>

                      <div class="row">
                        <a href="{{URL::to('admin/order/'.$order->id)}}" title="View" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                            </button>
                        </a>                        
<!-- 
                        <a href="{{URL::to('admin/order/'.$order->id.'/edit')}}" title="Edit" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                            </button>
                        </a> -->

                        <form action="{{URL::to('admin/order/'.$order->id)}}" method="post">
                        	@csrf
                        	@method('DELETE')
                        	<button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                      </div>


                  	</td>
                </tr>
				@endforeach
	
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


@endsection