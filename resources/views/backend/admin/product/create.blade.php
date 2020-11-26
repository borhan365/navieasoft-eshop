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
		              <form class="form-horizontal" action="{{URL::to('admin/product')}}" method="post" enctype="multipart/form-data">
		              	@csrf
		                <div class="card-body">
		                  <div class="form-group row">

            				<input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            				<input type="hidden" name="user_id" value="{{$user_id}}">
            				<input type="hidden" name="user_type" value="{{$user_type}}">
		                    
		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Product Name</label>
		                      	<input type="text" class="form-control" name="name" placeholder="Product Name">
		                    </div>

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Brand</label>
		                      	<select name="brand_id" class="form-control">
                                        @foreach($brands as $brand)
				                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>
		                    
		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Category</label>
		                      	<select name="category_id[]" id="category_id" class="form-control" multiple="multiple">
                                        @foreach($categories as $category)
				                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>			

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Attritube</label>
		                      	<select name="attribute_id[]" id="attribute_id" class="form-control" multiple="multiple">
                                        @foreach($attributes as $attribute)
				                            <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>		                    

<!-- 		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Sub Category</label>
		                      	<select name="subcategory_id" id="subcategory_id" class="form-control" onchange="GetProSubCategory(this.value)">
		                      		<option value="" selected="" disabled="">----Selected Sub Catgory----</option>
		                      	</select>
		                    </div>		                    

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Pro Sub Category</label>
		                      	<select name="prosubcategory_id" id="prosubcategory_id"  class="form-control">
		                      		<option value="" selected="" disabled="">----Selected Pro Sub Catgory----</option>

		                      	</select>
		                    </div> -->

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Size</label>
		                      	<select name="size_id[]" id="size_id" class="form-control"  multiple="multiple">
                                        @foreach($sizes as $size)
				                            <option value="{{$size->id}}"> {{$size->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>	
		                  </div>		                  
		                  
		                  	<div class="form-group row">
		                  		
			                    <div class="col-sm-2">
			                    	<label for="inputEmail3" class="col-form-label">Product Variation</label>
			                      	<input type="checkbox" name="product_veriation" onchange="showVariation()">
			                    </div>

			                    <div class="col-sm-12" id="productVeriation" style="display: block">
                                    <table class="table table-striped" id="productVer">
                                        <thead>
                                        <tr>
                                            <th>Attribute</th>
                                            <th>Attribute Value</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
							                      	<select name="attribute_id[]" id="attribute_id" class="form-control attribute_id">
							                      		<option value="">---Select Attribute---</option>
														@foreach($attributes as $attribute)
															<option value="{{$attribute->id}}">{{$attribute->name}}</option>
														@endforeach
							                      	</select>
                                                </td>
                                                <td>
							                      	<select name="attribute_value_id[]" id="attribute_value_id" class="form-control attribute_value_id">
							                      	</select>
                                                </td>

                                                <td>
													<input type="text" class="form-control" name="price[]">
                                                </td>
                                                <td>
													<input type="file" class="form-control" name="img[]">
                                                </td>
                                                <td> 
                                                	<button id="addVer"  type="button" class="btn btn-success addVer"><i class="fa fa-plus-circle"></i> </button>
                                                </td>
                                            </tr>
                                            <tr></tr>

                                        </tbody>
                                    </table>  

			                    </div>	
		                  	</div>
		                  	<div class="form-group row">
			                    <div class="col-sm-4">
			                    	<label for="inputEmail3" class="col-form-label">Buying Price</label>
			                      	<input type="number" step=".01" class="form-control" name="buying_price">
			                    </div>			                    

			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Market Price</label>
			                      <input type="number" step=".01" class="form-control" name="market_price">
			                    </div>

			                    <div class="col-sm-4">
			                    	<label for="inputEmail3" class="col-form-label">Selling Price</label>
			                      	<input type="number"  step=".01" class="form-control" name="sell_price">
			                    </div>


			                    <div class="col-sm-4">
			                    	<label for="inputEmail3" class=" col-form-label">Product Qty</label>
			                      	<input type="number" class="form-control" name="qty">
			                    </div> 
		                  	</div>

		                  	<div class="form-group row">
			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Product Color</label>
									<select class="form-control" id="color" name="color_id[]" multiple="multiple">
										@foreach($colors as $color)
									  		<option value="{{$color->id}}">{{$color->name}}</option>
									  	@endforeach
									</select>
			                    </div> 
			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Fetaure Image</label>
			                      <input type="file" class="form-control" name="image" placeholder="Fetaure Image">
			                    </div>
			                    <div class="col-sm-4">
			                    	<label for="inputEmail3" class="col-form-label">Product Image</label>
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
			                    </div>

		                  	</div>		                  	

		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Details</label>
		                    <div class="col-sm-9  mt-3">
						        <div class="col-md-12">
						            <div class="mb-3">
						                <textarea name="description" class="textarea" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
						            </div>
						        </div>
		                    </div>
		                  </div>		                  


		                  
		                  	<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-2 col-form-label">Note</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" name="note" placeholder="Note">
			                    </div> 
		                  	</div>

		                  <div class="form-group row">
		                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
		                    <div class="col-sm-9">
		                      <select name="status" id="" class="form-control">
		                      	<option value="1">Active</option>
		                      	<option value="0">Inactive</option>
		                      </select>
		                    </div>
		                  </div>
		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info">Save</button>
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



			$(document).on('click', '.addVer', function(){
				var html = '';
				html += '<tr>';
				html += '<td><select name="attribute_id[]" id="attribute_id" class="form-control attribute_id"><option value="">---Select Attribute---</option>@foreach($attributes as $attribute)<option value="{{$attribute->id}}">{{$attribute->name}}</option>@endforeach</select></td>';

				html += '<td><select name="attribute_value_id[]" id="attribute_value_id" class="form-control attribute_value_id"></select></td>';

				html += '<td><input type="text" class="form-control" name="price[]"></td>';
				html += '<td><input type="file" class="form-control" name="img[]"></td>';
				html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus-circle"></span></button></td></tr>';
				$('#productVer').append(html);
			});

		    $('#color').select2({
		      placeholder: 'Select Color'
		    });
		    $('#size_id').select2({
		      placeholder: 'Select Size'
		    });
		    $('#category_id').select2({
		      placeholder: 'Select Category'
		    });
		    $('#attribute_id').select2({
		      placeholder: 'Select Attribute'
		    });
        });  


		$(document).ready(function(){
			$(document).on("change", ".attribute_id", function(e){
				var $this = $(this);
				console.log($this);
				var token =  $("input[name=_token]").val();
				var datastr = "attribute_id=" + e.target.value  + "&token="+token;
				$.ajax({
					type: "post",
					url: "<?php echo route('admin/get-attribute-value'); ?>",
					data:datastr,
					cache:false,
					success:function (data) {
						console.log(data);
						$this.parent().siblings().find('.attribute_value_id').html(data);
					},
					error: function (jqXHR, status, err) {
						alert(status);
						console.log(err);
					},
					complete: function () {
						// alert("Complete");
					}
				});
			})
		})



		// function GetAttributeValue(value) {
			// var $this = $(this);
			// console.log($this);
			// var token =  $("input[name=_token]").val();
			// var datastr = "attribute_id=" + value  + "&token="+token;
			// $.ajax({
			// 	type: "post",
			// 	url: "<?php echo route('admin/get-attribute-value'); ?>",
			// 	data:datastr,
			// 	cache:false,
			// 	success:function (data) {
			// 		$this.parent().siblings().find('#attribute_value_id').html(data);
			// 	},
			// 	error: function (jqXHR, status, err) {
			// 		alert(status);
			// 		console.log(err);
			// 	},
			// 	complete: function () {
			// 		// alert("Complete");
			// 	}
			// });
		// }

		function showVariation() {
			$('#productVeriation').toggle();
		}



</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>





@endsection