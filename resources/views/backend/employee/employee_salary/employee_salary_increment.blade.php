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
			  <h4 class="box-title">Salary Increment To <span class="text-info">{{ $editData->name }}</span></h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('update.increment.store',$editData->id) }}">
						@csrf
					  <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<h5>Salary Amount<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="increment_salary" id="increment_salary" value="{{old('increment_salary')}}" class="form-control" required="">
									@error('increment_salary')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
						</div><!--End col-md-6-->
						<div class="col-md-6">
							<div class="form-group">
								<h5>Effected Date<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="date" name="effected_salary" id="effected_salary" value="{{old('effected_salary')}}" class="form-control" required="">
									@error('effected_salary')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
						</div><!--End col-md-6-->
					  </div><!--End row-->
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