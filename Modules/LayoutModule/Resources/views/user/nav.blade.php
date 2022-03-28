	<!--header-->
	
	<div class="header" dir="rtl" lang="ar">
		<div class="top-header navbar navbar-default">
			<!--header-one-->
			<div class="container">
				<div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
					<p>مرحبا بكم فى مطابع طنطاوى
						@if(auth()->guard('customer')->user())
						{{auth()->guard('customer')->user()->name}}
						<a href="{{route('customer.logout')}}">تسجيل خروج </a>
						@else
						<a href="{{url('/')}}">تسجيل دخول </a>
						@endif
						</p>
				</div>
				<div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated" data-wow-delay=".5s">
					<ul>
						<li><a href="#"> </a></li>
						<li><a href="#" class="pin"> </a></li>
						<li><a href="#" class="in"> </a></li>

						<li><a href="#" class="you"> </a></li>

					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="header-two navbar navbar-default">
			<!--header-two-->
			<div class="container">
				<div class="nav navbar-nav header-two-left">
					<ul>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">mail@example.com</a></li>
					</ul>
				</div>
				<div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
					<h1><a href="index.html">مطابع <b>طنطاوى</b>
							<span class="tag">كل ماتحتاجه فى عالم الطباعة</span> </a></h1>
				</div>
				<div class="nav navbar-nav navbar-right header-two-right">
					<div class="header-right my-account">
						<a href="contact.html"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> تواصل معانا</a>
					</div>
					<div class="header-right cart">
						<a href="{{route('user.cart')}}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
						<h4><a href="{{route('user.cart')}}">
								<span class=""> 
								@if(auth()->guard('customer')->user())
								@if(auth()->guard('customer')->user()->cartItems())	
								({{auth()->guard('customer')->user()->cartItems->count()}})
								{{auth()->guard('customer')->user()->cartItems->sum('total_price')}} LE  
								@else
								0 &nbsp;&nbsp; 0 LE
								@endif
							@else
						
						@endif
					 </span>
							</a></h4>
						<div class="cart-box">
							<!-- <p><a href="javascript:;" class="simpleCart_empty">تفريغ السلة </a></p> -->
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="top-nav navbar navbar-default">
			<!--header-three-->
			<div class="container">
				<nav class="navbar" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!--navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" dir="rtl" lang="ar">
						<ul class="nav navbar-nav top-nav-info">
							<li><a href="index.html" class="active">الرئيسية</a></li>
							<li class="dropdown grid">
								<a href="#" class="dropdown-toggle list1" data-toggle="dropdown">جميع المنتجات<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column multi-column2">
									<div class="row">
										<div class="col-sm-3 menu-grids">

											<ul class="multi-column-dropdown">
												<li><a class="list" href="{{route('user.create.letterhead')}}">ليترهيد</a></li>
												<li><a class="list" href="{{route('user.create.prescription')}}">روشتات</a></li>
												<li><a class="list" href="{{route('user.create.copybook')}}">دفاتر</a></li>
												<li><a class="list" href="{{route('user.create.envelope')}}">مظاريف </a></li>
												<li><a class="list" href="products.html">العلب </a></li>
												<li><a class="list" href="products.html">الامساكيات الرمضانية</a></li>
											</ul>
										</div>
										<div class="col-sm-3 menu-grids">

											<ul class="multi-column-dropdown">
												<li><a class="list" href="{{route('user.create.brochure')}}">بروشورات</a></li>
												<li><a class="list" href="products.html">بطاقات دعوة</a></li>
												<li><a class="list" href="{{route('user.create.small.folder')}}">فولدرات صغيرة</a></li>
												<li><a class="list" href="{{route('user.create.large.folder')}}">فولدرات كبيرة</a></li>
												<li><a class="list" href="single.html">كروت شخصية</a></li>
												<li><a class="list" href="{{route('user.create.calender')}}">نتائج التقويم الميلادى</a></li>

											</ul>
										</div>
										<div class="col-sm-3 menu-grids">

											<ul class="multi-column-dropdown">
												<li><a class="list" href="{{route('user.create.flyer')}}">فلاير</a></li>
												<li><a class="list" href="{{route('user.create.magazine')}}">مجلات</a></li>
												<li><a class="list" href="{{route('user.create.blocknote')}}">بلوك نوت </a></li>
												<li><a class="list" href="{{route('user.create.book')}}">كتب</a></li>
												<li><a class="list" href="{{route('user.create.sticker')}}">ملصقات</a></li>
												<li><a class="list" href="products.html">جميع أنواع التكسير</a></li>
											</ul>
										</div>
										<div class="col-sm-3 menu-grids new-add2">
											<a href="index.html">
												<h6> مطابع طنطاوى </h6>
												<img src="images/logo.png" alt="">
											</a>
										</div>
										<div class="clearfix"> </div>
									</div>
								</ul>
							</li>
							<li class="dropdown grid">
								<a href="#" class="dropdown-toggle list1" data-toggle="dropdown">منتجات أخرى<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column menu-two multi-column3">
									<div class="row">
										<div class="col-sm-4 menu-grids" style="text-align: center;">
											<ul class="multi-column-dropdown">
												<li><a class="list" href="products.html">ورق أبيض</a></li>
												<li><a class="list" href="products.html">زنكات</a></li>
												<li><a class="list" href="products.html">أحبار </a></li>
												<li><a class="list" href="products.html">بوتشر</a></li>
												<li><a class="list" href="products.html">مرطب</a></li>
												<li><a class="list" href="products.html">بودرة</a></li>
											</ul>
										</div>
										<div class="col-sm-8 menu-grids">
											<a href="products.html">
												<div class="new-add">
													<h5>30% OFF <br></h5>
												</div>
											</a>
										</div>

									</div>
								</ul>
							</li>
							<li><a href="codes.html"> خدمة العملاء</a></li>
						</ul>
						<div class="clearfix"> </div>
						<!--//navbar-collapse-->
						<header class="cd-main-header">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
							</ul> <!-- cd-header-buttons -->
						</header>
					</div>
					<!--//navbar-header-->
				</nav>
				<div id="cd-search" class="cd-search">
					<form>
						<input type="search" placeholder="Search...">
						
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--//header-->