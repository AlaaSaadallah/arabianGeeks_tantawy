@extends('layoutmodule::user.main')
@section('content')
	<!--breadcrumbs-->
	<div class="breadcrumbs" dir="rtl" lang="ar">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a>
				</li>
				<li class="active">{{$category->name}} </li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--single-page-->
	<div class="single">
		<div class="container">
			<div class="single-info">
				<div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">
					<div class="flexslider">
                    <ul class="slides">
						<li data-thumb="{{asset('assets/user/images/l1.jpg')}}">
							<div class="thumb-image"> <img src="{{url('assets/user/images/l1.jpg')}}" data-imagezoom="true" style="height: 400px;" class="img-responsive" alt=""> </div>
						</li>
						<li data-thumb="{{asset('assets/user/images/l2.jpg')}}">
							<div class="thumb-image"> <img src="{{url('assets/user/images/l2.jpg')}}" data-imagezoom="true" style="height: 400px;" class="img-responsive" alt=""> </div>
						</li>
						<li data-thumb="{{asset('assets/user/images/l3.jpg')}}">
							<div class="thumb-image"> <img src="{{url('assets/user/images/l3.jpg')}}" data-imagezoom="true" style="height: 400px;" class="img-responsive" alt=""> </div>
						</li>
						<li data-thumb="{{asset('assets/user/images/l4.jpg')}}">
							<div class="thumb-image"> <img src="{{url('assets/user/images/l4.jpg')}}" data-imagezoom="true" style="height: 400px;" class="img-responsive" alt=""> </div>
						</li>

					</ul>

					</div>
					<iframe style="height: 300px;width: 250px;" src="https://www.youtube.com/embed/tgbNymZ7vqY">
					</iframe>
				</div>

				<div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" dir="rtl" lang="ar"
					data-wow-delay=".5s">
					<h3>روشتات</h3>

					<h6 class="item_price">ارفع التصميم</h6><br>
					<form action="/action_page.php">
						<input type="file" id="myFile" name="filename">

					</form>
					<p>
						روشتات :
						تعتبر الروشتات
						افضل و أول وسيلة تواصل بينك وبين عملائك المستقلبيين وزملائك في العمل وافضل وسيله جذب العملاء
						المحتملين وزيادة التعريف بعلامتك التجارية احرص على اقتنائها دائما ودعنا نقدم لك الروشتات بافضل
						جودة واسعار رائعة عبر عدة اختيارات تلبي جميع رغباتك.

					</p>
					<table class="table">

						<tbody>
							<tr>
								<td> المقاس : </td>
								<td><select class="form-select" aria-label="Default select example">
										<option selected>اختر</option>
										<option value="A4 (21*29.7)">A4 (21*29.7)</option>
										<option value="A5 (21*15)">A5 (21*15)</option>
										<option value="A6 (15*10)">A6 (15*10)</option>
										<option value="B4 (33*24)">B4 (33*24)</option>
										<option value="B5 (24*16)">B5 (24*16)</option>
										<option value="B6 (12*16)">B6 (12*16)</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>شكل الطباعة :</td>
								<td>
									<select class="form-select" aria-label="Default select example">
										<option selected>اختر</option>
										<option value="one side">وجه فقط</option>
										<option value="two sides">وجه + ظهر</option>
										<option value="colored two sides">وجه + ظهر ألوان</option>


									</select>
								</td>
							</tr>
							<tr>
								<td>نوع الورق :</td>
								<td>
									<select class="form-select" aria-label="Default select example">
										<option selected>اختر</option>
										<option value="150 gm">80 جم</option>
										<option value="200 gm">100 جم</option>
										<option value="250 gm">120 جم</option>
										<option value="300 gm">115 جم</option>
										<option value="350 gm">130 جم</option>
										<option value="350 gm">150 جم</option>

									</select>
								</td>
							</tr>
							<tr>
								<td>الكمية : </td>
								<td>
									<select class="form-select" aria-label="Default select example">
										<option selected>اختر</option>
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
										<option value="40">40</option>
										<option value="60">60</option>
										<option value="80">80</option>
										<option value="120">120</option>
										<option value="160">160</option>
										<option value="200">200</option>

									</select>
								</td>
							</tr>
							<tr>
								<td>عدد الألوان</td>
								<td>
									<select class="form-select" aria-label="Default select example">
										<option selected>اختر</option>
										<option value="1 color">1 لون</option>
										<option value="2 color">2 لون</option>
										<option value="3 color">3 لون</option>
										<option value="4 color">4 لون</option>

									</select>
								</td>
							</tr>
							<tr>
								<td>التقفيل</td>
								<td>
									<select class="form-select" aria-label="Default select example">
										<option selected>اختر</option>
										<option value="9mm*55mm">غراء</option>
										<option value="84mm*55mm"> دبوس</option>
										<option value="84mm*55mm"> سللك</option>

									</select>
								</td>
							</tr>
							<tr>
								<td>الشرشرة</td>
								<td>
									<select class="form-select" aria-label="Default select example">
										<option selected>اختر</option>
										<option value="with">مع</option>
										<option value="without">بدون </option>


									</select>
								</td>
							</tr>
							<tr>
								<td>جهة التقفيل </td>
								<td>
									<select class="form-select" aria-label="Default select example">
										<option selected>اختر</option>
										<option value="9mm*55mm">فوق</option>
										<option value="84mm*55mm"> تحت</option>
										<option value="9mm*55mm">يمين</option>
										<option value="84mm*55mm"> شمال</option>

									</select>
								</td>
							</tr>

							<tr>
								<td>ملاحظات</td>
								<td>
									<textarea class="form-control rounded-0" rows="5">
									</textarea>
								</td>
							</tr>
						</tbody>
					</table>


					<div class="btn_form">
						<a href="#" class="add-cart item_add">اضافة للسلة</a>
					</div>
				</div>

				<div class="clearfix"> </div>
			</div>

			<!--collapse-tabs-->
			<div class="collpse tabs" dir="rtl" lang="ar">
				<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".5s">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
									aria-expanded="true" aria-controls="collapseOne">
									وصف المنتج
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
							aria-labelledby="headingOne">
							<div class="panel-body">
								كرت شخصي :الكروت الشخصية افضل و أول وسيلة تواصل بينك وبين عملائك المستقلبيين وزملائك في
								العمل وافضل وسيله جذب العملاء المحتملين وزيادة التعريف بعلامتك التجارية احرص على
								اقتنائها دائما ودعنا نقدم لك كرت شخصي بافضل جودة واسعار رائعة عبر عدة اختيارات تلبي جميع
								رغباتك.

							</div>
						</div>
					</div>
					<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".6s">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
									href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									معلومات اضافية
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
							aria-labelledby="headingTwo">
							<div class="panel-body">

								خيارات متعددة من الورق تلبي رغباتك<br>
								خيارات متعددة لمقاسات الطباعة<br>
								واذا كان لديك مقاسات معينة تريد طباعتها يرجى
								<a href="contact.html">التواصل معانا</a>
								<br>
								اذا رغبت بطباعة كميات كبيرة يرجى
								<a href="contact.html">التواصل معانا</a>
								لتقديم سعر خاص لكم
								<br>
								خيارات متعددة للطباعة لتلبية رغباتكم
								<br>
								لخدمة التنفيذ بشكل مستعجل يرجى يرجى
								<a href="contact.html">التواصل معانا</a>
								خاضع لرسوم اضافية
							</div>
						</div>

						<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".8s">
							<div class="panel-heading" role="tab" id="headingFour">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
										href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										طلب المساعدة
									</a>
								</h4>
							</div>
							<div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
								aria-labelledby="headingFour">
								<div class="panel-body">
									توفير اعلى معايير الجودة في مجال الطباعة ،والتوسع في مجال الخدمات الطباعية لمواكبة
									تطلعات عملائنا وخدمتهم وكسب ثقتهم بهدف رضى العميل، وحصوله على المنتج بسعر مناسب، وفي
									وقت قياسي
									<a href="contact.html">تواصل معانا الان</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--//collapse -->
				<!--related-products-->

				<!--//related-products-->
			</div>
		</div>
	</div>
	<!--//single-page-->
    @push('scripts')
<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>

<script>
	function show1() {
		document.getElementById('div2').style.display = 'none';
		document.getElementById('div1').style.display = 'block';
		document.getElementById('div3').style.display = 'block';
		document.getElementById('div4').style.display = 'none';
	}

	function show2() {
		document.getElementById('div1').style.display = 'none';
		document.getElementById('div2').style.display = 'block';
		document.getElementById('div3').style.display = 'none';
		document.getElementById('div4').style.display = 'block';
	}

	function show3() {
		document.getElementById('div1').style.display = 'none';
		document.getElementById('div2').style.display = 'none';
		document.getElementById('div3').style.display = 'none';
		document.getElementById('div4').style.display = 'none';

	}

	function show4() {
		var x = document.getElementById("selector").value;
		if (x == 2) {
			document.getElementById('div5').style.display = 'block';
			document.getElementById('div6').style.display = 'block';

		} else if (x == 1) {
			document.getElementById('div5').style.display = 'block';
			document.getElementById('div6').style.display = 'none';
		} else {
			document.getElementById('div5').style.display = 'none';
			document.getElementById('div6').style.display = 'none';
		}

	}
</script>
@endpush
@endsection