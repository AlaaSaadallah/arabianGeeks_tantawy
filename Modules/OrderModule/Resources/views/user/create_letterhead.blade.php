@extends('layoutmodule::user.main')
@section('content')
<div class="breadcrumbs" dir="rtl" lang="ar">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a></li>
			<li class="active"> {{$category->name}} </li>
		</ol>
	</div>
</div>
<!--single-page-->
<div class="single">
    <div class="container">
        <div class="single-info">
            <div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">
                <div class="flexslider">
                    <!--item images-->
                    <ul class="slides">
                        <li data-thumb="{{ asset('assets/user/images/l1.jpg') }}">
                            <div class="thumb-image"> <img src="{{ url('assets/user/images/l1.jpg') }}" data-imagezoom="true" style="height: 400px;" class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="{{ asset('assets/user/images/l2.jpg') }}">
                            <div class="thumb-image"> <img src="{{ url('assets/user/images/l2.jpg') }}" data-imagezoom="true" style="height: 400px;" class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="{{ asset('assets/user/images/l3.jpg') }}">
                            <div class="thumb-image"> <img src="{{ url('assets/user/images/l3.jpg') }}" data-imagezoom="true" style="height: 400px;" class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="{{ asset('assets/user/images/l4.jpg') }}">
                            <div class="thumb-image"> <img src="{{ url('assets/user/images/l4.jpg') }}" data-imagezoom="true" style="height: 400px;" class="img-responsive" alt=""> </div>
                        </li>

                    </ul>

                </div>
                <!--item video-->
                <iframe style="height: 300px;width: 250px;" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                </iframe>
            </div>

            <div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" dir="rtl" lang="ar" data-wow-delay=".5s">
                <h3>{{ $category->name }}</h3>

                <h6 class="item_price">ارفع التصميم</h6><br>
                <!-- <form action="/action_page.php"> -->
                <form action="{{route('user.order.storeLetterhead')}}" method="POST" enctype="multipart/form-data" class="form">

                    @csrf
                    <input type="hidden" name="" id="cat_id" value="{{$category->id}}">

                    <input type="file" id="myFile" name="filename">

                    <p>
                        ليتر هيد :
                        تعتبر الليتر هيد
                        هي الواجهة الاولى لتعاملاتك مع الجهات الخارجية والداخلية، فمن خلالها يمكنك إنجاز الكثير من الأعمال الهامة والحيوية .نقدم لك الدفاتر بافضل جودة واسعار رائعة عبر عدة اختيارات تلبي جميع رغباتك.
                    </p>

                    <table class="table">

                        <tbody>
                            <tr>
                                <td> المقاس : </td>
                                <td><select class="form-select" aria-label="Default select example" name="paper_size" id="paper_size">
                                        <option value="" selected>اختر</option>
                                        @foreach ($category->paperSizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}({{$size->width}} * {{$size->height}} )</option>
                                        @endforeach
                                        <!-- <option value="A4 (21*29.7)">A4 جاير طبع (60*84)</option>
                                        <option value="A4 (21*29.7)">A4 عادى (100*70)</option>
                                        <option value="A4 (21*29.7)">A4 جاير كوشيه (88*66)</option> -->


                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>شكل الطباعة :</td>
                                <td>
                                    <select class="form-select" onchange="show4();" id="selector" aria-label="Default select example" name="print_option">
                                        <option value="" selected>اختر</option>
                                        @foreach ($category->printOptions as $option)
                                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach


                                    </select>
                                </td>
                            </tr>
                            <tr style="display: none;" id="div5">
                                <td>عدد ألوان الوجه</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="frontcolors">
                                        <option value="" selected>اختر</option>
                                        <option value="1">1 لون</option>
                                        <option value="2">2 لون</option>
                                        <option value="3">3 لون</option>
                                        <option value="4">4 لون</option>

                                    </select>
                                </td>

                            </tr>
                            <tr style="display: none;" id="div6">
                                <td>عدد ألوان الظهر</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="backcolors">
                                        <option value="" selected>اختر</option>
                                        <option value="1">1 لون</option>
                                        <option value="2">2 لون</option>
                                        <option value="3">3 لون</option>
                                        <option value="4">4 لون</option>

                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>نوع الورق :</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="paper_type" id="paper_type">
                                        <option value="" selected>اختر</option>
                                      

                                        <!-- <option value="150 gm">60 جم</option>
                                        <option value="200 gm">70 جم</option>
                                        <option value="250 gm">80 جم</option>
                                        <option value="300 gm">100 جم</option>
                                        <option value="350 gm">120 جم</option>
                        
                                        <option value="350 gm">115 عادى جم</option>
                                        <option value="350 gm">130  عادى جم</option>
                                        <option value="350 gm">150  عادى جم</option>
                                        <option value="350 gm">200  عادى جم</option>
                                        <option value="350 gm">250  عادى جم</option>
                                        <option value="350 gm">300  عادى جم</option>
                                        <option value="350 gm">350  عادى جم</option>
        
                                    
                                        <option value="350 gm">115 جاير جم</option>
                                        <option value="350 gm">130  جاير جم</option>
                                        <option value="350 gm">150  جاير جم</option>
                                        <option value="350 gm">200  جاير جم</option>
                                        <option value="350 gm">250  جاير جم</option>
                                        <option value="350 gm">300  جاير جم</option>
                                        <option value="350 gm">350  جاير جم</option>-->

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>الكمية : </td>
                                <td>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="quantity" class="sr-only">الكمية</label>
                                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="ادخل الكمية 1000 ومضاعفاتها">
                                    </div>
                                </td>
                            </tr>
                            <tr id="div4" style="display: none;">
                                <td>شكل القص</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="cutStyle">
                                        <option value="" selected>اختر</option>
                                        <option value="normal"> عادى</option>
                                        <option value="curve"> كيرف</option>


                                    </select>
                                </td>
                            </tr>
                            <tr id="div4">
								<td>شكل القص</td>
								<td>
									<select class="form-select" aria-label="Default select example" name="cutStyle">
										<option selected>اختر</option>
										@foreach ($category->cutStyles as $style)
										<option value="{{ $style->id }}">{{ $style->name }}</option>
										@endforeach
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
                        <button class="btn add-cart item_add">اضافة للسلة</button>
                    </div>

                </form>
            </div>
            <div class="clearfix"> </div>
        </div>

        <!--collapse-tabs-->
        <div class="collpse tabs" dir="rtl" lang="ar">
            <div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".5s">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                وصف المنتج
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            كرت شخصي :الكروت الشخصية افضل و أول وسيلة تواصل بينك وبين عملائك المستقلبيين وزملائك في
                            العمل وافضل وسيله جذب العملاء المحتملين وزيادة التعريف بعلامتك التجارية احرص على اقتنائها
                            دائما ودعنا نقدم لك كرت شخصي بافضل جودة واسعار رائعة عبر عدة اختيارات تلبي جميع رغباتك.

                        </div>
                    </div>
                </div>
                <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".6s">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                معلومات اضافية
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
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
                </div>

                <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".8s">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                طلب المساعدة
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            توفير اعلى معايير الجودة في مجال الطباعة ،والتوسع في مجال الخدمات الطباعية لمواكبة تطلعات
                            عملائنا وخدمتهم وكسب ثقتهم بهدف رضى العميل، وحصوله على المنتج بسعر مناسب، وفي وقت قياسي
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
<!--//single-page-->

@push('scripts')
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
        $(".form")[0].reset();
    });
</script>

<script>
    $(document).ready(function() {
        $('#paper_size').on('change', function() {
            var optionSelected = $(this).find("option:selected");
            var sizeid = optionSelected.val();
            if (sizeid == '') {
                $('#paper_type').html(`<option value=""
                              >اختر</option>`);
            }

            var catid = $('#cat_id').val();
            var route = '/order/filterPaperTypes/' + catid + '/' + sizeid;
            $.ajax({
                url: route,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    var options = '';
                                            
                    for (var i = 1; i <= Object.keys(data).length; i++) {
                        options += ` <option value="${data[i].id}"
                              >${data[i].name}
                                </option>`
                            }
                            console.log(options)
                    $('#paper_type').html(options);
                },
                error: function() {
                    console.log("failure From php side!!! ");
                }
            });
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