@extends('layouts.admin.app')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Admin Dashboard') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

<!--           <div class="col-lg-3 col-6">
            <div class="small-box bg-white">
              <div class="inner">
                <?php
                    $total_sells = App\Models\Order::select('total_cost', 'total_qty')->where('status', 1)->get();
                    $sell = 0;
                ?>
                  @foreach($total_sells as $data)
                    <?php 
                      $sell = $sell+($data->total_cost*$data->total_qty);
                      ?>
                  @endforeach

                <h3>{{$sell}}</h3>

                <p>Total Sell</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">All Time Sell <i class="fas fa-dollar-sign"></i></a>
            </div>
          </div> -->

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                    $date = date('Y-m-d');
                    $today_sells = App\Models\Order::select('total_cost', 'total_qty')->where('status', 1)->where( 'created_at', 'LIKE', '%' . $date .'%')->get();
                    $sell = 0;
                ?>
                  @foreach($today_sells as $data)
                    <?php 
                      $sell = $sell+($data->total_cost*$data->total_qty);
                      ?>
                  @endforeach

                <h3>{{$sell}}</h3>

                <p>Sell</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Today Sell <i class="fas fa-dollar-sign"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                    $date = date('Y-m-d');
                    $today_orders = App\Models\Order::where( 'created_at', 'LIKE', '%' . $date .'%')->count();
                ?>
                <h3>{{$today_orders}}</h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

<!--           <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                    $total_orders = App\Models\Order::count();
                ?>
                <h3>{{$total_orders}}</h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
<!-- 
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                    $success_orders = App\Models\Order::where('status', 2)->count();
                ?>
                <h3>{{$success_orders}}</h3>

                <p>Successful Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->

 <!--          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                    $pending_orders = App\Models\Order::where('status', 0)->count();
                ?>
                <h3>{{$pending_orders}}</h3>

                <p>Pending Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
 -->
<!--           <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                    $processing_orders = App\Models\Order::where('status', 1)->count();
                ?>
                <h3>{{$processing_orders}}</h3>

                <p>Processing Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->


<!--           <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                    $cancel_orders = App\Models\Order::where('status', 3)->count();
                ?>
                <h3>{{$cancel_orders}}</h3>

                <p>Cancel Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->







          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                    $products = App\Models\Product::count();
                ?>
                <h3>{{$products}}</h3>

                <p>Total Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                    $withdraw = App\Models\Withdraw::count();
                ?>
                <h3>{{$withdraw}}</h3>

                <p>Withdraw</p>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


<!--           <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                    $pending_withdraw = App\Models\Withdraw::where('status', 0)->count();
                ?>
                <h3>{{$pending_withdraw}}</h3>

                <p>Pending Withdraw</p>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->





        </div>


          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Vendor" role="tab" aria-controls="Vendor" aria-selected="true">Vendor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Importer" role="tab" aria-controls="Importer" aria-selected="false">Importer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Merchat" role="tab" aria-controls="Merchat" aria-selected="false">Merchant</a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Customer" role="tab" aria-controls="Customer" aria-selected="false">Customer</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Vendor" role="tabpanel" aria-labelledby="home-tab">
              
                
                <section class="content">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Manage Vendor</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Sl.</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Company</th>
                              <th>Address</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                        @php $i=1 @endphp
                        @foreach($vendors as $vendor)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$vendor->name}}</td>
                                <td>{{$vendor->email}}</td>
                                <td>{{$vendor->phone}}</td>
                                <td>{{$vendor->company}}</td>
                                <td>{{$vendor->address}}</td>
                              <td>
                                  @php
                                      if($vendor->status == 1){
                                              echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                                          }else{
                                              echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                                          }
                                  @endphp
                                  
                              </td>
                                <td>
                                  <div class="row">
                                    <?php  if($vendor->status == 1){ ?>
                                    <a href="{{route('admin/inactive-vendor',[$vendor->id])}}"
                                       class="btn btn-success btn-sm" title="Inactive"  style="float: left;margin-right: 10px;"><i
                                                class="fa fa-arrow-down"></i></a>
                                    <?php }else{ ?>
                                    <a href="{{route('admin/active-vendor',[$vendor->id])}}"
                                       class="btn btn-warning btn-sm" title="Active"  style="float: left;margin-right: 10px;"><i
                                                class="fa fa-arrow-up"></i></a>
                                    <?php } ?>
                                    <a href="{{URL::to('admin/vendor/'.$vendor->id)}}" title="Edit" style="float: left;margin-right: 10px;">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <form action="{{URL::to('admin/vendor/'.$vendor->id)}}" method="post">
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


            </div>
            <div class="tab-pane fade" id="Importer" role="tabpanel" aria-labelledby="profile-tab">
              
              <section class="content">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Manage Importer</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                      @php $i=1 @endphp
                      @foreach($importers as $importer)
                          <tr>
                              <td>{{$i++}}</td>
                              <td>{{$importer->name}}</td>
                              <td>{{$importer->email}}</td>
                              <td>{{$importer->phone}}</td>
                              <td>{{$importer->company}}</td>
                              <td>{{$importer->address}}</td>
                            <td>
                                @php
                                    if($importer->status == 1){
                                            echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                                        }else{
                                            echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                                        }
                                @endphp
                                
                            </td>
                              <td>
                                <div class="row">
                                  <?php  if($importer->status == 1){ ?>
                                  <a href="{{route('admin/inactive-importer',[$importer->id])}}"
                                     class="btn btn-success btn-sm" title="Inactive"  style="float: left;margin-right: 10px;"><i
                                              class="fa fa-arrow-down"></i></a>
                                  <?php }else{ ?>
                                  <a href="{{route('admin/active-importer',[$importer->id])}}"
                                     class="btn btn-warning btn-sm" title="Active"  style="float: left;margin-right: 10px;"><i
                                              class="fa fa-arrow-up"></i></a>
                                  <?php } ?>                        <a href="{{URL::to('admin/importer/'.$importer->id)}}" title="Edit" style="float: left;margin-right: 10px;">
                                      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                      </button>
                                  </a>

                                  <form action="{{URL::to('admin/importer/'.$importer->id)}}" method="post">
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

            </div>
            <div class="tab-pane fade" id="Merchat" role="tabpanel" aria-labelledby="contact-tab">
              
              <section class="content">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Manage Merchant</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                      @php $i=1 @endphp
                      @foreach($merchants as $merchant)
                          <tr>
                              <td>{{$i++}}</td>
                              <td>{{$merchant->name}}</td>
                              <td>{{$merchant->email}}</td>
                              <td>{{$merchant->phone}}</td>
                              <td>{{$merchant->company}}</td>
                              <td>{{$merchant->address}}</td>
                            <td>
                                @php
                                    if($merchant->status == 1){
                                            echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                                        }else{
                                            echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                                        }
                                @endphp
                                
                            </td>
                              <td>
                                <div class="row">
                                  <?php  if($merchant->status == 1){ ?>
                                  <a href="{{route('admin/inactive-merchant',[$merchant->id])}}"
                                     class="btn btn-success btn-sm" title="Inactive"  style="float: left;margin-right: 10px;"><i
                                              class="fa fa-arrow-down"></i></a>
                                  <?php }else{ ?>
                                  <a href="{{route('admin/active-merchant',[$merchant->id])}}"
                                     class="btn btn-warning btn-sm" title="Active"  style="float: left;margin-right: 10px;"><i
                                              class="fa fa-arrow-up"></i></a>
                                  <?php } ?>                         <a href="{{URL::to('admin/merchant/'.$merchant->id)}}" title="Edit" style="float: left;margin-right: 10px;">
                                      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                      </button>
                                  </a>

                                  <form action="{{URL::to('admin/merchant/'.$merchant->id)}}" method="post">
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


            </div>            
            <div class="tab-pane fade" id="Customer" role="tabpanel" aria-labelledby="contact-tab">
              <section class="content">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Manage Customer</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example4" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                      @php $i=1 @endphp
                      @foreach($customers as $customer)
                          <tr>
                              <td>{{$i++}}</td>
                              <td>{{$customer->first_name." ".$customer->last_name}}</td>
                              <td>{{$customer->email}}</td>
                              <td>{{$customer->phone}}</td>
                            <td>
                                @php
                                    if($customer->status == 1){
                                            echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                                        }else{
                                            echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                                        }
                                @endphp
                                
                            </td>
                              <td>
                                <div class="row">
                                  <?php  if($customer->status == 1){ ?>
                                  <a href="{{route('admin/inactive-customer',[$customer->id])}}"
                                     class="btn btn-success btn-sm" title="Inactive"  style="float: left;margin-right: 10px;"><i
                                              class="fa fa-arrow-down"></i></a>
                                  <?php }else{ ?>
                                  <a href="{{route('admin/active-customer',[$customer->id])}}"
                                     class="btn btn-warning btn-sm" title="Active"  style="float: left;margin-right: 10px;"><i
                                              class="fa fa-arrow-up"></i></a>
                                  <?php } ?>
                                  <a href="{{URL::to('admin/customer/'.$customer->id)}}" title="View" style="float: left;margin-right: 10px;">
                                      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                      </button>
                                  </a>
                                  <form action="{{URL::to('admin/customer/'.$customer->id)}}" method="post">
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
            </div>
          </div>


        </div>


      </div>
    </section>


@endsection
