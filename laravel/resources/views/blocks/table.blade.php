@extends('index')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{ $title or '&nbsp;' }}
            <small>{{ $subtitle or '&nbsp;' }}</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{ $title or $table }}</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
	        
	      <div class="row">
            <div class="col-xs-12">
            	<div class="box">
               	<div class="box-header">
                  	<h3 class="box-title">
	                  	{{ $title or $table }}
	                </h3>
	                
	                  		@if (isset($addnew))
	                  		<div>
	                  		<a href="/{{$table}}/create">Add New {{$addnew}}</a>
	                  		</div>
	                  		@endif
               	</div><!-- /.box-header -->
						<div class="box-body">
                  	<div id="{{ $table }}_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
	                  	<div class="row">
				               <div class="col-sm-12">
					               <table id="{{ $table }}" class="table table-bordered table-hover" role="grid" aria-describedby="{{ $table }}_info">
											@yield('data')
	                  			</table>
	                  		</div>
                  		</div>
					   	</div>
               	</div><!-- /.box-body -->
            	</div><!-- /.box -->
         	</div><!-- /.col -->
      	</div>
          
        </section><!-- /.content -->
@endsection

@section('footer')

<script>
		      $(function () {
		        $('#{{ $table }}').DataTable({
		          "paging": true,
		          "lengthChange": false,
		          "searching": false,
		          "ordering": true,
		          "info": true,
		          "autoWidth": false
		        });
		       });
    </script>

@endsection