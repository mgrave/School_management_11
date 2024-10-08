 @extends('admin.admin_master')
 @section('admin')

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Subject</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('store.subject') }}">
						@csrf
					  <div class="row">
						<div class="col-12">
								<div class="form-group">
									<h5>Subject Name<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required="">
										@error('name')
										<span class="text-danger">{{ $message }}</span>
										@enderror
										</div>
								</div>
						</div>
					  </div>
						<div class="text-xs-right">
					<input type="submit" class="btn btn-info" value="Submit">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>

@endsection