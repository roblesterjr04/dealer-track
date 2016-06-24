@extends('blocks.form')

@section('form')
<form class="form-horizontal" method="POST">
	{{ csrf_field() }}
        <div class="row">
		  <div class="col-md-5">
	      <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ isset($application) ? 'Edit' : 'Add' }} App</h3>
                </div><!-- /.box-header -->
                @include('errors.app')
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group">
                      <label for="a_name" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input value="{{ isset($application) ? $application->name : old('a_name') }}" type="text" class="form-control" name="a_name" placeholder="Application Name">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="a_key" class="col-sm-2 control-label">Key</label>
                      <div class="col-sm-10">
	                      <div class="input-group">
						  	<div class="input-group-btn">
							  	<button type="button" class="btn btn-default keygen"><i class="fa fa-refresh"></i></button>
						  	</div>
						  	<input value="{{ isset($application) ? $application->key : old('a_key') }}" type="hidden" class="form-control" name="a_key">
						  	<p class="form-control-static">&nbsp;&nbsp;{{ isset($application) ? ($application->key ?: 'Application Key') : 'Generate Private Key' }}</p>
	                      </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="a_secret" class="col-sm-2 control-label">Secret</label>
                      <div class="col-sm-10">
                        <div class="input-group">
						  	<div class="input-group-btn">
							  	<button type="button" class="btn btn-default keygen"><i class="fa fa-refresh"></i></button>
						  	</div>
						  	<input value="{{ isset($application) ? $application->private : old('a_secret') }}" type="hidden" class="form-control" name="a_secret">
						  	<p class="form-control-static">&nbsp;&nbsp;{{ isset($application) ? ($application->private ?: 'Secret') : 'Generate Secret' }}</p>
	                      </div>
                      </div>
                    </div>
                     
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info btn-flat pull-right">Save</button>
                  </div><!-- /.box-footer -->
                
              </div>
		      </div>
		      
				<div class="col-md-7">
					<div class="box box-success">
						<div class="box-header">
							<h3 class="box-title">Resource Objects</h3>
							<p>Select which resource objects this app has access to.</p>
						</div>
						<div class="box-body">
						@foreach ($objects as $object)
							@include('blocks.object_tile')
						@endforeach
						</div>
					</div>
				</div>
	      </div>
	      </form>
@endsection

@section('footer')
<script>
	$('button.keygen').click(function(e) {
		e.preventDefault();
		var inst = $(this);
		$(inst).find('i').addClass('fa-spin');
		$.ajax({
			url: '/apps/newkey',
			type: 'POST',
			context: document.body,
			data: {
				_token: '{{csrf_token()}}',
			}
		}).done(function(data) {
			$(inst).parent().parent().find('input').val(data);
			$(inst).parent().parent().find('p').text(data);
			$(inst).find('i').removeClass('fa-spin');
		});
	});
</script>        
@endsection