@extends('app')

@section('body')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form class="form" action="/auth/register" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
			</div>
			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="conf_password">Confirm Password</label>
				<input type="password" class="form-control" id="conf_password" name="password_confirmation" placeholder="Confirm Password">
			</div>
			<button type="submit" class="btn btn-primary">Register</button>
			
		</form>
	</div>
</div>

@endsection