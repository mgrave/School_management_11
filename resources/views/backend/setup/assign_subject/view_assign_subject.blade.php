 @extends('admin.admin_master')
 @section('admin')
 <div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border d-flex justify-content-between">
				  <h3 class="box-title">Assigned Subject List</h3>
				  <a href="{{ route('add.assgin.subject') }}" class="btn btn-success" style="float: right;"><i class="ti-plus">Add Assign Subject</i></a>
				</div>



				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Class Name</th>
								<th width="30%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key => $item)
							<tr>
								<td>{{ $key+1}}</td>
								<td>{{ $item->class->name}}</td>
								<td>
									<a href="{{ route('edit.assgin.subject',$item->class_id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('details.assgin.subject',$item->class_id) }}" class="btn btn-warning">Details</a>
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th width="5%">Sl</th>
								<th>Class Name</th>
								<th width="30%">Action</th>
							</tr>
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>

@endsection