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
            <li><a href="/{{ $table or strtolower($title)}}">{{ $title }}</a></li>
            <li class="active">{{ $subtitle or '&nbsp;' }}</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
	      @yield('form')
        </section><!-- /.content -->
@endsection