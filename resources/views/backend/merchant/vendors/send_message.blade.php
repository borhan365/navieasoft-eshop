@extends('layouts.merchant.app')

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
          	<div class="col-md-8 offset-2">

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
		                <h3 class="card-title">Contact With {{$vendor->name}}</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('merchant/product')}}" method="post" enctype="multipart/form-data">
		              	@csrf
		                <div class="card-body">
		                  <div class="form-group row">

            				<input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
		                    
		                    <div class="col-sm-12">
		                    	<label for="inputEmail3" class="col-form-label">Your Name</label>
		                      	<input type="text" class="form-control" name="name" required="">		                    	

		                      	<label for="inputEmail3" class="col-form-label">Subject</label>
		                      	<input type="text" class="form-control" name="name"required="">                    	

		                      	<label for="inputEmail3" class="col-form-label">Message</label>
		                      	<textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
		                    </div>


		                  </div>		                  
		                  

		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info">Send</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>



@endsection