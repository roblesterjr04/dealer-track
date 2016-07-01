@extends('blocks.form')

@section('form')
	<form class="form-horizontal" method="POST">
		{{ csrf_field() }}
		<div class="row">
	
				<div class="col-md-6">
					<div class="box box-warning">
						<div class="box-header with-border">
							<h3 class="box-title">Device User Data</h3>
						</div><!-- /.box-header -->
						@include('errors.app')
						<!-- form start -->
						<div class="box-body">
							<div class="form-group">
								<label for="user_name" class="col-sm-2 control-label">Name</label>
								<div class="col-sm-10">
									<input value="{{ isset($device) ? $device->user_name : old('user_name') }}" type="text" class="form-control" name="user_name" placeholder="User Full Name">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input value="{{ isset($device) ? $device->email : old('email') }}" type="email" class="form-control" name="email" placeholder="User Email Address">
								</div>
							</div>
							<div class="form-group">
								<label for="phone" class="col-sm-2 control-label">Phone #</label>
								<div class="col-sm-10">
									<input value="{{ isset($device) ? $device->phone : old('phone') }}" type="tel" class="form-control" name="phone" placeholder="User Phone #">
								</div>
							</div>
						</div><!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-info btn-flat pull-right">Save</button>
						</div><!-- /.box-footer -->
					</div>
				</div>
				
				@if (isset($device) && !$device->active)	
				
				<div class="col-md-6">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3>Active Device</h3>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-6 col-sm-offset-3">
									<img style="max-width: 100%" src='https://chart.googleapis.com/chart?cht=qr&chl={{ $device->activation }}&chs=500x500&choe=UTF-8&chld=L|2' alt="Activate Device">
									<h1 style="text-align: center">{{ $device->pairing_code }}</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				@endif
	
	
		</div>
	</form>
@endsection

@section('footer')
<script>
	
</script>        
@endsection