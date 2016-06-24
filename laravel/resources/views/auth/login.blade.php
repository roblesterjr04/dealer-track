@extends('app')

@section('class', 'login')

@section('body')

<div class="vid-wrap hidden-sm hidden-xs">
	<video autoplay loop>
		<source src="/assets/videos/motion.mp4">
	</video>
</div>
<div class="vid-cover"></div>

<div class="container">
	
	<div class="row">
		
		<div class="col-sm-6">
			
			<h1>Dealer <b>Track</b></h1>
			
		</div>
		
		<div class="col-sm-4">
			<form method="POST">
				@include('errors.app')
				{{ csrf_field() }}
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-flat bg-olive btn-lg btn-block">Log In</button>
			</form>
			
		</div>
	</div>
	
</div>


@endsection