@extends('blocks.form')

@section('form')

        <div class="row">
		      <div class="col-sm-12 col-md-4 col-md-push-8">
			      <div class="row">
				      @if (isset($user))
				      <div class="col-xs-6 col-md-12">
					  	
					  	<img style="max-width: 100%; display: block; margin: 0 auto;" src="http://www.gravatar.com/avatar/{{ md5($user->email) }}?s=200" class="img-circle" alt="User Image">
					  	
					  	<a href="https://en.gravatar.com/" target="_blank" class="btn btn-link btn-block" style="margin: 15px  auto;">Update Profile Image</a>
				      </div>
				      <div class="col-xs-6 col-md-12 text-center">
					      <p>Member Since: {{ date('l, M. j, Y', strtotime($user->created_at)) }}</p>
				      </div>
				      @endif
			      </div>
		      </div>
		      <div class="col-sm-12 col-md-8 col-md-pull-4">
	      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ isset($user) ? 'Edit' : 'Add' }} User</h3>
                </div><!-- /.box-header -->
                @include('errors.app')
                <!-- form start -->
                <form class="form-horizontal" method="POST">
	                {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="u_email" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input value="{{ isset($user) ? $user->email : old('u_email') }}" type="email" class="form-control" name="u_email" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="u_name" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input value="{{ isset($user) ? $user->name : old('u_name') }}" type="text" class="form-control" name="u_name" placeholder="Full Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="phone" class="col-sm-2 control-label">Phone</label>
                      <div class="col-sm-10">
                        <input value="{{ isset($user) ? $user->phone : old('phone') }}" type="number" class="form-control" name="phone" placeholder="Phone Number">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="u_password" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input value="{{ isset($user) ? '' : old('u_password') }}" type="password" class="form-control" name="u_password" placeholder="New Password">
                      </div>
                    </div>
                    <!--<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                      </div>
                    </div>-->
                    <!--<div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> Remember me
                          </label>
                        </div>
                      </div>
                    </div>-->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
		      </div>
	      </div>
        
@endsection