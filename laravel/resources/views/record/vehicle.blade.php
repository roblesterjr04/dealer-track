@extends('blocks.form')

@section('form')
<form class="form-horizontal" method="POST">
	{{ csrf_field() }}
        <div class="row">
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
                        <input value="{{ isset($object) ? $vehicle->vin : old('a_name') }}" type="text" class="form-control" name="vin" placeholder="Vehicle Identification Number">
                      </div>
                    </div>
                    
                    
                     
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info btn-flat pull-right">Save</button>
                  </div><!-- /.box-footer -->
                
              </div>
		      </div>
		      
			
	      </div>
	      </form>
@endsection

@section('footer')
<script>
	
</script>        
@endsection