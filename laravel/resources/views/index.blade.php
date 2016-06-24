@extends('app')

@section('class', 'index fixed hold-transition skin-red-light sidebar-mini')

@section('body')

<div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">D<b>T</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Dealer<b>Track</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        @include('nav.top-nav')
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      @include('nav.side-nav')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
	      @yield('content')
      </div>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2013-{{ date('Y') }} <a href="http://www.rmlsoft.com">RML Software</a>.</strong> All rights reserved.
      </footer>

      @include('nav.control')
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    
    <!-- DataTables -->
    <script src="/assets/AdminLTE-2.3.0/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/AdminLTE-2.3.0/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/assets/AdminLTE-2.3.0/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/AdminLTE-2.3.0/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="/assets/AdminLTE-2.3.0/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="/assets/AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/assets/AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="/assets/AdminLTE-2.3.0/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="/assets/AdminLTE-2.3.0/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="/assets/AdminLTE-2.3.0/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/AdminLTE-2.3.0/dist/js/demo.js"></script>
    
    <script src="/assets/AdminLTE-2.3.0/plugins/iCheck/icheck.min.js"></script>
    
    @if (isset($_GET['saved']))
    	<script>
	    	BootstrapDialog.show({
		    	message: '{{ isset($table) ? ucwords(rtrim($table, 's')) : '' }} Saved!',
		    	type: BootstrapDialog.TYPE_SUCCESS,
		    	title: 'Saved',
		    	buttons: [
			    	{
				    	label: 'Ok',
				    	action: function(dialog) {
					    	dialog.close();
				    	}
			    	}
		    	]
	    	});
	    </script>
    @endif

@yield('footer')

@endsection