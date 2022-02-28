@extends('layoutmodule::user.main')
@section('content')

<head>
    <title>مطابع طنطاوى </title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content=" مطابع طنطاوى كل ماهو جديد فى عالم الطباعة و مطابع طنطاوى فى جميع انحاء جمهورية مصر العربية " />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--//for-mobile-apps -->
    <!--Custom Theme files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//Custom Theme files -->
    <!--js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--//js-->
    <!--cart-->
    <script src="js/simpleCart.min.js"></script>
    <!--cart-->
    <!--web-fonts-->

    <!--web-fonts-->
    <!--animation-effect-->
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//animation-effect-->
    <!--close-button-->
    <script>
        $(document).ready(function(c) {
            $('.alert-close').on('click', function(c) {
                $('.cart-header').fadeOut('slow', function(c) {
                    $('.cart-header').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(c) {
            $('.alert-close1').on('click', function(c) {
                $('.cart-header1').fadeOut('slow', function(c) {
                    $('.cart-header1').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(c) {
            $('.alert-close2').on('click', function(c) {
                $('.cart-header2').fadeOut('slow', function(c) {
                    $('.cart-header2').remove();
                });
            });
        });
    </script>
    <!--//close-button-->
    <!--start-smooth-scrolling-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
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
</head>

<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Check Out page</li>
        </ol>
    </div>
</div>
<!--//breadcrumbs-->
<!--cart-items-->
<div class="cart-items">
    <div class="container">
        <h3 class="wow fadeInUp animated" data-wow-delay=".5s">My Shopping Cart({{$cart_items->count()}})</h3>
        <div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
            <div class="alert-close"> </div>
            <div class="cart-sec simpleCart_shelfItem">
                @foreach($cart_items as $item)
                <div class="cart-item cyc">
                    <a href="single.html"><img src="{{url('uploads/cart/'.$item->image)}}" class="img-responsive" alt=""></a>
                </div>
                <div class="cart-item-info">
                    <h4><a href="single.html">{{$item->category}} </a><span>Pickup time :</span></h4>
                    <ul class="qty">
                        <li>
                            <p>Total Order : {{$item->total_price}} LE</p>
                        </li>
                        <li>
                            <p>Shipping value : {{$item->shipping}} LE</p>
                        </li>
                    </ul>
                    <div class="delivery">
                        <p>Service Charges : $10.00</p>
                        <span>Delivered in 1-1:30 hours</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="clearfix"></div> -->
                <hr>
            </div>
        </div>
       

    </div>
</div>
@endsection