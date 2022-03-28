
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>طنطاوى </title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">

    <!-- Bootstrap -->
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/datatables.net-bs/css/dataTables..bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- NProgress -->
    <link href="{{asset('assets/admin/css/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('assets/admin/css/green.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('assets/admin/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
      
	@include ('layoutmodule::admin.nav')

        <!-- page content -->
        <div class="right_col" role="main" style="min-height: 2000px;">
          <!-- <div class=""> -->
		  @yield('content')
          <!-- </div> -->
        </div>
        <!-- /page content -->

        
  
<!-- ************************************************************* -->


	

	<script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
   

    <!-- Bootstrap -->
   <script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('assets/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('assets/admin/vendors/nprogress/nprogress.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    
    <script src="{{asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>


    <script src="{{asset('assets/admin/build/js/custom.min.js')}}"></script>

	@stack('scripts')

</body>


</html>