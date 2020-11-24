@extends('layouts.admin.app')

@section('content')


<style>
	
.note-editor.note-frame .note-editing-area .note-editable {
    height: 200px;
}


</style>

<section class="content  mt-5">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          	<div class="col-md-12">

	            @if ($errors->any())
	                <div class="alert alert-danger">
	                    <ul>
	                        @foreach ($errors->all() as $error)
	                            <li>{{ $error }}</li>
	                        @endforeach
	                    </ul>
	                </div>
	            @endif
          		

	            <!-- Horizontal Form -->
		            <div class="card card-info">
		              <div class="card-header">
		                <h3 class="card-title">Add Product</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('admin/product/'.$product->id)}}" method="post" enctype="multipart/form-data">
		              	@csrf
		              	@method('PATCH')
		                <div class="card-body">
		                  <div class="form-group row">

            				<input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
		                    
		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Product Name</label>
		                      <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{$product->name}}">
		                    </div>

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Brand</label>
		                      	<select name="brand_id" class="form-control">
		                      		<option value="" selected="" disabled="">----Selected Brand----</option>}
                                        @foreach($brands as $brand)
				                            <option value="{{$brand->id}}" @php echo $brand->id==$product->brand_id?"selected":""; @endphp>{{$brand->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>
		                    
		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Category</label>
		                      	<select name="category_id[]" id="category_id" class="form-control" onchange="GetSubCategory(this.value)"  multiple="multiple">
		                      		<option value="" disabled="">----Selected Catgory----</option>}
                                        @foreach($product_categories as $product_category)
				                            <option value="{{$product_category->category_id}}" selected="">{{$product_category->category->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>		                    

<!-- 		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Sub Category</label>
		                      	<select name="subcategory_id" id="subcategory_id" class="form-control" onchange="GetProSubCategory(this.value)">
		                      		<option value="" selected="" disabled="">----Selected Sub Catgory----</option>
                                    @foreach($subcategories as $subcategory)
			                            <option value="{{$subcategory->id}}" @php echo $subcategory->id==$product->subcategory_id?"selected":""; @endphp>{{$subcategory->name}}</option>
                                    @endforeach

		                      	</select>
		                    </div>		                    

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Pro Sub Category</label>
		                      	<select name="prosubcategory_id" id="prosubcategory_id"  class="form-control">
		                      		<option value="" selected="" disabled="">----Selected Pro Sub Catgory----</option>
                                    @foreach($prosubcategories as $prosubcategory)
			                            <option value="{{$prosubcategory->id}}" @php echo $prosubcategory->id==$product->prosubcategory_id?"selected":""; @endphp>{{$prosubcategory->name}}</option>
                                    @endforeach
		                      	</select>
		                    </div> -->

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Size</label>
		                      	<select name="size_id[]" id="size_id" class="form-control"  multiple="multiple">

                                	@foreach($product_sizes as $p_size)
		                            	<option value="{{$p_size->size_id}}" selected=""> {{$p_size->size->name}}</option>
		                            @endforeach

		                      	</select>
		                    </div>	

		                  </div>		                  
		                  
		                  	<div class="form-group row">
			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Buying Price</label>
			                      <input type="number" step=".01" class="form-control" name="buying_price" value="{{$product->buying_price}}">
			                    </div>			                    

			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Market Price</label>
			                      <input type="number" step=".01" class="form-control" name="market_price" value="{{$product->market_price}}">
			                    </div>

			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Selling Price</label>
			                      <input type="number"  step=".01" class="form-control" name="sell_price" value="{{$product->sell_price}}">
			                    </div>


			                    <div class="col-sm-4">
			                    	<label for="inputEmail3" class=" col-form-label">Product Qty</label>
			                      <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
			                    </div> 
		                  	</div>

		                  	<div class="form-group row">
			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Product Color</label>
									<select class="form-control" id="color" name="color_id[]" multiple="multiple">
										@foreach($product_colors as $color)
									  		<option value="{{$color->color_id}}" selected="">{{$color->color->name}}</option>
									  	@endforeach
									</select>
			                    </div> 

			                    <div class="col-sm-4">
				             		<label for="inputEmail3" class="col-form-label">Feature Image</label>
			                      	<input type="file" class="form-control" name="image" >
			                    	@if(isset($product))
					                <div class="form-group">
					                    <img src="{{ asset($product->image) }}" alt="Image" style="width: 30%; margin-top: 8px">
					                    <input type="hidden" name="old_image" value="{{ $product->image }}">
					                </div>
				            		@endif
			                    </div>


			                    <div class="col-sm-4">
			                    	<label for="inputEmail3" class="col-form-label">Product Image</label>
									@if(count($productImages) > 0)
				                    	@foreach($productImages as $productImage)
					                    	@if(isset($productImage))
								                <div class="form-group">
								                    <img src="{{ asset($productImage->product_image) }}" alt="Image" style="width: 30%">
								                    <input type="hidden" name="old_product_image" value="{{ $productImage->product_image }}">
								                </div>
					                    	@endif
	                                    <table class="table table-striped" id="productImage">
	                                        <thead>
	                                        <tr>
	                                            <th>Image</th>
	                                            <th>Action</th>
	                                        </tr>
	                                        </thead>
	                                        <tbody>
	                                            <tr>
	                                                <td><input type="file" class="form-control" name="product_image[]"></td>
	                                                <td> <button id="add"  type="button" class="btn btn-success add"><i class="fa fa-plus-circle"></i> </button></td>
	                                            </tr>
	                                            <tr></tr>

	                                        </tbody>
	                                    </table>  
                                    @endforeach
                                   	@else
	                                    <table class="table table-striped" id="productImage">
	                                        <thead>
	                                        <tr>
	                                            <th>Image</th>
	                                            <th>Action</th>
	                                        </tr>
	                                        </thead>
	                                        <tbody>
	                                            <tr>
	                                                <td><input type="file" class="form-control" name="product_image[]" ></td>
	                                                <td> <button id="add"  type="button" class="btn btn-success add"><i class="fa fa-plus-circle"></i> </button></td>
	                                            </tr>
	                                            <tr></tr>

	                                        </tbody>
	                                    </table> 
                                    @endif
			                    </div>

		                  	</div>		                  	

		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Details</label>
		                    <div class="col-sm-9  mt-3">
						        <div class="col-md-12">
						            <div class="mb-3">
						                <textarea name="description" class="textarea" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$product->description!!}</textarea>
						            </div>
						        </div>
		                    </div>
		                  </div>		                  


		                  
		                  	<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-2 col-form-label">Note</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" name="note" placeholder="Note" value="{{$product->note}}">
			                    </div> 
		                  	</div>

		                  <div class="form-group row">
		                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
		                    <div class="col-sm-9">
		                      <select name="status" id="" class="form-control">
                        			<option value="1" @php echo $product->status==1?"selected":""; @endphp>Active</option>
                        			<option value="0" @php echo $product->status==0?"selected":""; @endphp>Inactive</option>
		                      </select>
		                    </div>
		                  </div>
		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info">Update</button>
		                  <button type="reset" class="btn btn-default float-right">Cancel</button>
		                </div>
		                <!-- /.card-footer -->
		              </form>
	            </div>
	            <!-- /.card -->
			</div>
		</div>
	</div>
</section>




<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- <script src="{{asset('admin/jquery.min.js')}}"></script> -->
<script type="text/javascript">
		$( document ).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$(document).on('click', '.add', function(){
				var html = '';
				html += '<tr>';
				html += '<td><input type="file" name="product_image[]" class="form-control" required/></td>';
				html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus-circle"></span></button></td></tr>';
				$('#productImage').append(html);
			});

			$(document).on('click', '.remove', function(){
				$(this).closest('tr').remove();
			});


			$(document).on('click', '.remove', function(){
				$(this).closest('tr').remove();
			});

		    $('#color').select2({
		      placeholder: 'Select Color'
		    })
		    $('#size_id').select2({
		      placeholder: 'Select Size'
		    })
		    $('#category_id').select2({
		      placeholder: 'Select Category'
		    })

        });  


		function GetSubCategory(value) {
			var token =  $("input[name=_token]").val();
			var datastr = "category_id=" + value  + "&token="+token;
			console.log(datastr);
			$.ajax({
				type: "post",
				url: "<?php echo route('admin/get-subcategory'); ?>",
				data:datastr,
				cache:false,
				success:function (data) {
					$('#subcategory_id').html(data);
				},
				error: function (jqXHR, status, err) {
					alert(status);
					console.log(err);
				},
				complete: function () {
					// alert("Complete");
				}
			});
		}

		function GetProSubCategory(value) {
			var token =  $("input[name=_token]").val();
			var datastr = "subcategory_id=" + value  + "&token="+token;
			console.log(datastr);
			$.ajax({
				type: "post",
				url: "<?php echo route('admin/get-prosubcategory'); ?>",
				data:datastr,
				cache:false,
				success:function (data) {
					$('#prosubcategory_id').html(data);
				},
				error: function (jqXHR, status, err) {
					alert(status);
					console.log(err);
				},
				complete: function () {
					// alert("Complete");
				}
			});
		}



</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>





@endsection