@extends('layoutmodule::user.main')

@section('content')

<!--banner-->
	<div class="banner">

		<div class="container" style="width: 100%;">

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->


				<!-- Wrapper for slides -->
				<div class="carousel-inner" dir="rtl" lang="ar">

					<div class="item active">
						<img src="{{url('assets/user/images/2.jpg')}}" alt="Los Angeles" style="width:100%;height: 100vh;">
						<div class="carousel-caption"">
			<h1  style=" font-size:5vw;">كارت شخصى</h1>
							<h3 style="font-size:3vw;"> اكتشف جودة طباعة بطاقات العمل باضافات جمالية متنوعة ومن خلال مجموعة واسعة من الخيارات</h3>
						</div>
					</div>

					<div class="item">
						<img src="{{url('assets/user/images/item3.jpg')}}" alt="Chicago" style="width:100%;height: 100vh;">
						<div class="carousel-caption">
							<h1 style="font-size:5vw;">فولدرات</h1>
							<h3 style="font-size:3vw;">اكتشف جودة طباعة الفولدرات باضافات جمالية متنوعة ومن خلال مجموعة واسعة من الخيارات</h3>
						</div>
					</div>

					<div class="item">
						<img src="{{url('assets/user/images/item1.jpg')}}" alt="New York" style="width:100%;height: 100vh;">
						<div class="carousel-caption">
							<h1 style="font-size:5vw;">التكسير بأنواعه</h1>
							<h3 style="font-size:3vw;">اكتشف جودة التكسير بأنواعه باضافات جمالية متنوعة ومن خلال مجموعة واسعة من الخيارات</h3>
						</div>
					</div>

				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<!--//banner-->
	<!--new-->
	<div class="new" dir="rtl" lang="ar">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title">الأكثر <span>مبيعا </span></h3>
				<p>اختر المنتج او الخدمة اللتي ترغب بها وابداء بتصميم ماتريد او ارفع تصميمك الجاهز ودع التنفيذ لنا</p>
			</div>
			<div class="new-info">
				<div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
					<div class="new-top">
						<a href="single.html"><img src="images/item3.jpg" style="width: 220px;height: 249px;" class="img-responsive" alt="" /></a>
						<div class="new-text">
							<ul>
								<li><a class="item_add" href=""> اضافة للسلة</a></li>
								<li><a href="single.html">عرض التفاصيل </a></li>
							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="single.html">فولدرات </a></h5><br>

						<div class="ofr">

							<p><span class="item_price">ابتداء من 50 جنيه</span></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 new-grid new-mdl simpleCart_shelfItem wow flipInY animated" data-wow-delay=".7s">
					<div class="new-top">
						<a href="single.html"><img src="images/g10.jpg" style="width: 220px;height: 249px;" class="img-responsive" alt="" /></a>
						<div class="new-text">
							<ul>
								<li><a class="item_add" href=""> اضافة للسلة</a></li>
								<li><a href="single.html">عرض التفاصيل </a></li>

							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="single.html">كروت </a></h5><br>

						<div class="ofr">
							<p><span class="item_price">ابتداء من 50 جنيه </span></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 new-grid new-mdl1 simpleCart_shelfItem wow flipInY animated" data-wow-delay=".9s">
					<div class="new-top">
						<a href="single.html"><img src="images/g11.jpg" style="width: 220px;height: 249px;" class="img-responsive" alt="" /></a>
						<div class="new-text">
							<ul>
								<li><a class="item_add" href=""> اضافة للسلة</a></li>
								<li><a href="single.html">عرض التفاصيل </a></li>
							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="single.html">بروشور ومطويات </a></h5>

						<div class="ofr">
							<p><span class="item_price">ابتداء من 50 جنيه</span></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay="1.1s">
					<div class="new-top">
						<a href="single.html"><img src="images/g12.jpg" style="width: 220px;height: 249px;" class="img-responsive" alt="" /></a>
						<div class="new-text">
							<ul>
								<li><a class="item_add" href=""> اضافة للسلة</a></li>
								<li><a href="single.html">عرض التفاصيل </a></li>
							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="single.html">ليتر هيد </a></h5>

						<div class="ofr">

							<p><span class="item_price">ابتداء من 50 جنيه</span></p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="new-info">
				<div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
					<div class="new-top">
						<a href="single.html"><img src="images/item3.jpg" style="width: 220px;height: 249px;" class="img-responsive" alt="" /></a>
						<div class="new-text">
							<ul>
								<li><a class="item_add" href=""> اضافة للسلة</a></li>
								<li><a href="single.html">عرض التفاصيل </a></li>
							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="single.html">ملصقات </a></h5><br>

						<div class="ofr">

							<p><span class="item_price">ابتداء من 50 جنيه</span></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 new-grid new-mdl simpleCart_shelfItem wow flipInY animated" data-wow-delay=".7s">
					<div class="new-top">
						<a href="single.html"><img src="images/g10.jpg" style="width: 220px;height: 249px;" class="img-responsive" alt="" /></a>
						<div class="new-text">
							<ul>
								<li><a class="item_add" href=""> اضافة للسلة</a></li>
								<li><a href="single.html">عرض التفاصيل </a></li>

							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="single.html">أظرف </a></h5><br>

						<div class="ofr">
							<p><span class="item_price">ابتداء من 50 جنيه </span></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 new-grid new-mdl1 simpleCart_shelfItem wow flipInY animated" data-wow-delay=".9s">
					<div class="new-top">
						<a href="single.html"><img src="images/g11.jpg" style="width: 220px;height: 249px;" class="img-responsive" alt="" /></a>
						<div class="new-text">
							<ul>
								<li><a class="item_add" href=""> اضافة للسلة</a></li>
								<li><a href="single.html">عرض التفاصيل </a></li>
							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="single.html">نوت بوك </a></h5>

						<div class="ofr">
							<p><span class="item_price">ابتداء من 50 جنيه</span></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay="1.1s">
					<div class="new-top">
						<a href="single.html"><img src="images/g12.jpg" style="width: 220px;height: 249px;" class="img-responsive" alt="" /></a>
						<div class="new-text">
							<ul>
								<li><a class="item_add" href=""> اضافة للسلة</a></li>
								<li><a href="single.html">عرض التفاصيل </a></li>
							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="single.html">علب التكسير </a></h5>

						<div class="ofr">

							<p><span class="item_price">ابتداء من 50 جنيه</span></p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//new-->
	<!--gallery-->
	<div class="gallery" dir="rtl" lang="ar">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title">أحدث<span> المنتجات</span></h3>
				<p> </p>
			</div>
			<div class="gallery-info">
				<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
					<a href="products.html"><img src="images/g1.jpg" style="height: 230px;" class="img-responsive" alt="" /></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="single.html">كتاب مشروع تخرج</a></h5>
						<p><span class="item_price">300 جنيه</span></p>
						<ul>
							<li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
					<a href="products.html"><img src="images/g1.jpg" style="height: 230px;" class="img-responsive" alt="" /></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="single.html">كتاب مشروع تخرج</a></h5>
						<p><span class="item_price">300 جنيه</span></p>
						<ul>
							<li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
					<a href="products.html"><img src="images/g1.jpg" style="height: 230px;" class="img-responsive" alt="" /></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="single.html">كتاب مشروع تخرج</a></h5>
						<p><span class="item_price">300 جنيه</span></p>
						<ul>
							<li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
					<a href="products.html"><img src="images/g1.jpg" style="height: 230px;" class="img-responsive" alt="" /></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="single.html">كتاب مشروع تخرج</a></h5>
						<p><span class="item_price">300 جنيه</span></p>
						<ul>
							<li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
					<a href="products.html"><img src="images/g1.jpg" style="height: 230px;" class="img-responsive" alt="" /></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="single.html">كتاب مشروع تخرج</a></h5>
						<p><span class="item_price">300 جنيه</span></p>
						<ul>
							<li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
					<a href="products.html"><img src="images/g1.jpg" style="height: 230px;" class="img-responsive" alt="" /></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="single.html">كتاب مشروع تخرج</a></h5>
						<p><span class="item_price">300 جنيه</span></p>
						<ul>
							<li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
					<a href="products.html"><img src="images/g1.jpg" style="height: 230px;" class="img-responsive" alt="" /></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="single.html">كتاب مشروع تخرج</a></h5>
						<p><span class="item_price">300 جنيه</span></p>
						<ul>
							<li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
					<a href="products.html"><img src="images/g1.jpg" style="height: 230px;" class="img-responsive" alt="" /></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="single.html">كتاب مشروع تخرج</a></h5>
						<p><span class="item_price">300 جنيه</span></p>
						<ul>
							<li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//gallery-->
	<!--trend-->
	<!--//trend-->

	@push('scripts')

<!--//end-smooth-scrolling-->
		<script type="text/javascript">
		$(document).ready(function() {

			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!--//smooth-scrolling-of-move-up-->
	@endpush
    @endsection