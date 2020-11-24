@extends('layouts.admin.app')

@section('content')



<style>
	
/*.note-editor.note-frame .note-editing-area .note-editable {
    height: 200px;
}
*/

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
		                <h3 class="card-title">Add Post</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('admin/post')}}" method="post" enctype="multipart/form-data">
		              	@csrf
		                <div class="card-body">
		                  <div class="form-group row">

            				<input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
		                    
		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Post Title</label>
		                      <input type="text" class="form-control" id="title" name="title" placeholder="Post Title" onkeyup="Makeslug()">
		                    </div>		

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Slug</label>
		                      <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
		                    </div>		                    

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Meta Title</label>
		                      	<input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
		                    </div>

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Meta Description</label>
		                      	<textarea name="meta_description" class="form-control" id="" cols="30" rows="2"></textarea>
		                    </div>

		                    
<!-- 		                    <div class="col-sm-4">
		                    	<label for="inputEmail3" class="col-form-label">Category</label>
		                      	<select name="category_id" id="category_id" class="form-control" onchange="GetSubCategory(this.value)">
		                      		<option value="" selected="" disabled="">----Selected Catgory----</option>}
                                        @foreach($categories as $category)
				                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>	 -->	                    
			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Fetaure Image</label>
			                      <input type="file" class="form-control" name="image" placeholder="Fetaure Image">
			                    </div>

		                  </div>		                  


		                  	

		                  	<div class="form-group row">
		                    	<label for="inputEmail3" class="col-sm-2 col-form-label">Post Description</label> 
						        <div class="col-md-12">
						            <div class="mb-3">
						                <textarea name="description" class="textarea" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
						            </div>
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

		    $('#color').select2({
		      placeholder: 'Select Color'
		    })
		    $('#size_id').select2({
		      placeholder: 'Select Color'
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

		function Makeslug(){
		    var post_title = $('#title').val();
		    Text = post_title.toLowerCase();
		    Text = post_title.replace(/[^a-zA-Z0-9]+/g,'_');
		    $("#slug").val(Text);  
		}

</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>





@endsection