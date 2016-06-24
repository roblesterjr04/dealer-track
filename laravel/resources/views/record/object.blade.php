@extends('blocks.form')

@section('form')
<form class="form-horizontal" method="POST">
	{{ csrf_field() }}
        <div class="row">
		  <div class="col-md-3">
	      <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ isset($object) ? 'Edit' : 'Add' }} Object</h3>
                </div><!-- /.box-header -->
                @include('errors.app')
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group">
                      <label for="a_name" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input value="{{ isset($object) ? $object->name : old('a_name') }}" type="text" class="form-control" name="a_name" placeholder="Application Name">
                      </div>
                    </div>
                    
                    
                     
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info btn-flat pull-right">Save</button>
                  </div><!-- /.box-footer -->
                
              </div>
		      </div>
		      
				<div class="col-md-9">
					<div class="box box-success">
						<div class="box-header">
							<h3 class="box-title">Object Contents</h3>
						</div>
						<div class="box-body">
							
						</div>
					</div>
				</div>
	      </div>
	      </form>
@endsection

@section('footer')
<script>
	
</script>        
@endsection