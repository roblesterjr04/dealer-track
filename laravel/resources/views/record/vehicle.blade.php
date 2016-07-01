@extends('blocks.form')

@section('form')
	<form class="form-horizontal" method="POST">
		{{ csrf_field() }}
		<div class="row">
			@if(!isset($vehicle))
	
				<div class="col-md-6 col-md-offset-3">
					<div class="box box-warning">
						<div class="box-header with-border">
							<h3 class="box-title">{{ isset($vehicle) ? 'Edit' : 'Add' }} Vehicle</h3>
						</div><!-- /.box-header -->
						@include('errors.app')
						<!-- form start -->
						<div class="box-body">
							<div class="form-group">
								<label for="vin" class="col-sm-2 control-label">VIN</label>
								<div class="col-sm-10">
									<input value="{{ isset($object) ? $vehicle->vin : old('vin') }}" type="text" class="form-control" name="vin" placeholder="Vehicle Identification Number">
								</div>
							</div>
						</div><!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-info btn-flat pull-right">Save</button>
						</div><!-- /.box-footer -->
					</div>
				</div>
	
			@else
	
				<div class="col-md-6">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">{{ isset($vehicle) ? 'Edit' : 'Add' }} Vehicle</h3>
						</div><!-- /.box-header -->
						@include('errors.app')
						<!-- form start -->
						<div class="box-body">
							<div class="form-group">
								<label for="vin" class="col-sm-2 control-label">VIN</label>
								<div class="col-sm-10">
									<p class="form-control-static">{{ $vehicle->vin }}</p>
									<input type="hidden" value="{{ $vehicle->vin }}" name="vin" />
								</div>
							</div>
							<div class="form-group">
								<label for="stock_id" class="col-sm-2 control-label">Stock #</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="stock_id" value="{{ $vehicle->stock_id }}" />
								</div>
							</div>
							<div class="form-group">
								<label for="new" class="col-sm-2 control-label">New</label>
								<div class="col-sm-10">
									<p class="form-control-static">
										<label><input type="radio" value="0" name="new" {{ $vehicle->new == 0 ? 'checked' : '' }} /> No</label>&nbsp;&nbsp;
										<label><input type="radio" value="1" name="new" {{ $vehicle->new == 1 ? 'checked' : '' }} /> Yes</label>
									</p>
								</div>
							</div>
						</div><!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-info btn-flat pull-right">Save</button>
						</div><!-- /.box-footer -->
					</div>
				</div>
	
				<div class="col-md-6">
					<div class="box box-{{ $vehicle->new ? 'success' : 'default' }}">
						<div class="box-header with-border">
							<h3 class="box-title">Vehicle Info</h3>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-5">
									<img src="{{ $vehicle->img_url }}" style="max-width: 100%" />
								</div>
								<div class="col-md-7">
									<h4>{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</h4>
									<p>{{ $vehicle->style_name }}</p>
								</div>
							</div>
							
						</div>
					</div>
					<div class="box box-warning">
						<div class="box-header with-border">
							<h3 class="box-title">Last Location</h3>
						</div>
						<div class="box-body">
							@if (count($vehicle->location))
							<div id="map" style="height: 300px"></div>
							<script>
								function initMap() {
								// Create a map object and specify the DOM element for display.
									var myLatLng = {lat: {{ $vehicle->location[0]->lat }}, lng: {{ $vehicle->location[0]->lon }}};
									var map = new google.maps.Map(document.getElementById('map'), {
										center: myLatLng,
										scrollwheel: false,
										zoom: 20,
										mapTypeId: google.maps.MapTypeId.SATELLITE
									});
									var marker = new google.maps.Marker({
										position: myLatLng,
										map: map,
										title: '{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}'
									});
									map.setTilt(0);
								}
							</script>
							<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCMYVl2WC1nHHaccZpkz0BLJqRCFShBnaM&callback=initMap" async defer></script>
							@endif
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