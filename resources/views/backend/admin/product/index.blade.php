@extends('layouts.admin.app')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Product</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>SubCategory</th>
                  <th>ProSubCategory</th>
                  <th>Brand</th>
                  <th>Buying Price</th>
                  <th>Market Price</th>
                  <th>Sell Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @php $i=1 @endphp
            @foreach($products as $product)
                <tr>
                  	<td>{{$i++}}</td>
                    <td><img src="{{ asset($product->image) }}" alt="" style=" background: #fff;width: 130px;height: 60px;text-align: center;box-sizing: border-box;box-shadow: 6px 9px 11px -5px rgba(0,0,0,0.30);"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name ?? ''}}</td>
                    <td>{{$product->subcategory->name ?? ''}}</td>
                    <td>{{$product->prosubcategory->name ?? ''}}</td>
                    <td>{{$product->brand->name ?? ''}}</td>
                    <td>{{$product->buying_price}}</td>
                    <td>{{$product->market_price}}</td>
                    <td>{{$product->sell_price}}</td>

	                <td>
	                    @php
	                        if($product->status == 1){
                              echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                          }else{
                              echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                          }
	                    @endphp
                      
	                </td>
                  	<td>

                      <div class="dropdown">
                        <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a href="{{URL::to('admin/product/'.$product->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">
                              <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                              </button>
                          </a>

                          <form action="{{URL::to('admin/product/'.$product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                          </form>

                        </div>
                      </div>



                  	</td>
                </tr>
				@endforeach
	
                </tfoot>
              </table>
              {{ $products->links() }}
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