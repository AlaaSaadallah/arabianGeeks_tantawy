<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
	<title>مطابع طنطاوى </title>
	<link rel="icon" type="image/x-icon" href="images/logo.png">
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content=" مطابع طنطاوى كل ماهو جديد فى عالم الطباعة و مطابع طنطاوى فى جميع انحاء جمهورية مصر العربية " />

	<!--//for-mobile-apps -->
	<!--Custom Theme files -->
	<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  -->
	<link href="{{asset('assets/user/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{asset('assets/user/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!--//Custom Theme files -->

	<!--web-fonts-->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
	<!--web-fonts-->
	<!--animation-effect-->
	<link rel="stylesheet" href="{{asset('assets/user/css/flexslider1.css')}}" type="text/css" media="screen" />
	<link href="{{asset('assets/user/css/animate.min.css')}}" rel="stylesheet">

</head>

<body>
	<div class="container-fluid">
		@include ('layoutmodule::user.nav',['cat' => $cat = Modules\CategoryModule\Entities\Category::all()])

		<section class="section">
			
			@yield('content')
		</section>

		@include ('layoutmodule::user.footer')
	</div>
	<!--search jQuery-->

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>


	<!--js-->
	<script src="{{asset('assets/user/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('assets/user/js/modernizr.custom.js')}}"></script>
	<!--//js-->
	<!--cart-->
	<script src="{{asset('assets/user/js/simpleCart.min.js')}}"></script>
	<!--cart-->
	<script src="{{asset('assets/user/js/main.js')}}"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->

	<script src="{{asset('assets/user/js/wow.min.js')}}"></script>
	<script defer src="{{asset('assets/user/js/jquery.flexslider.js')}}"></script>

	<script>
		new WOW().init();
	</script>
	<!--//animation-effect-->
	<!--start-smooth-scrolling-->
	<script type="text/javascript" src="{{asset('assets/user/js/move-top.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/user/js/easing.js')}}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!--//end-smooth-scrolling-->
	<script type="text/javascript">
		$(document).ready(function() {

			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};

		

		});
	</script>
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
	<!--Placed at the end of the document so the pages load faster -->
	<script src="{{asset('assets/user/js/bootstrap.js')}}"></script>
	@stack('scripts')

</body>

</html>