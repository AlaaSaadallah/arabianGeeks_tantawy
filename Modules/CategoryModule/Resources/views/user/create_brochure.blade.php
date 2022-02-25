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
                <form action="{{route('user.cart.addBrochure')}}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf
                    <input type="hidden" name="" id="cat_id" value="{{$category->id}}">

                    <input type="file" id="myFile" name="image">


                    <p>
                        كرت شخصي :الكروت الشخصية افضل و أول وسيلة تواصل بينك وبين عملائك المستقلبيين وزملائك في العمل وافضل
                        وسيله جذب العملاء المحتملين وزيادة التعريف بعلامتك التجارية احرص على اقتنائها دائما ودعنا نقدم لك
                        ليتر هيد بافضل جودة واسعار رائعة عبر عدة اختيارات تلبي جميع رغباتك.

                    </p>
                    <table class="table">

                        <tbody>
                            <tr>
                                <td> المقاس : </td>
                                <td><select class="form-select select" aria-label="Default select example" name="paper_size" id="paper_size">
                                        <option value="" selected>اختر</option>
                                        @foreach ($category->paperSizes as $size)
                                        <option class="size_option" value="{{ $size->id }}">
                                            @if($size->id == 8 || $size->id == 9 || $size->id == 7)
                                            {{$size->width}} * {{$size->height}}
                                            @else
                                            {{ $size->name }}({{$size->width}} * {{$size->height}} )
                                            @endif
                                        </option>
                                        @endforeach
                                        <!-- <option value="84mm*55mm">A4 جاير</option> -->

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>شكل الطباعة :</td>
                                <td>
                                    <select class="form-select" id="selector" aria-label="Default select example" name="print_option" onchange="show4();">
                                        <option selected>اختر</option>
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
                                        <option disabled>اختر</option>
                                        @foreach ($category->colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </td>

                            </tr>
                            <tr style="display: none;" id="div6">
                                <td>عدد ألوان الظهر</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="backcolors">
                                        @foreach ($category->colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>نوع الورق :</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="paper_type" id="paper_type">
                                        <option disabled>اختر</option>

                                    </select>
                                </td>
                            </tr>
                            <tr id="div2" style="display: none;">

                                <td>ريجه :</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="rega">
                                        <option value="" disable>اختر</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <!-- <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option> -->

                                    </select>
                                </td>
                            </tr>
                            <tr id="div4">
                                <td>شكل القص</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="cutStyle">
                                        <option value="" selected>اختر</option>
                                        <option value="1" >عادي</option>

                                        <option value="2" >كيرف</option>

                                        <!-- @foreach ($category->cutStyles as $cut_style)
                                        <option value="{{ $cut_style->id }}">{{ $cut_style->name }}</option>
                                        @endforeach -->
                                    </select>
                                </td>
                            </tr>
                            <tr id="div10" style="display: none;">
                                <td>سلوفان :</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="covers">
                                        <option value="" selected>اختر</option>
                                        <option value="1">لامع وجه واحد </option>
                                        <option value="2">لامع وجهين </option>
                                        <option value="1">مط وجه واحد </option>
                                        <option value="2">مط وجهين </option>
                                        <option value="0">بدون </option>


                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>الكمية : </td>
                                <td>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="quantity" class="sr-only">الكمية</label>
                                        <input type="text" class="form-control" id="quantity" placeholder="ادخل الكمية 1000 ومضاعفاتها" name="quantity">
                                    </div>
                                </td>
                            </tr>

                            <!-- <tr>
                                <td>جهة التقفيل </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="finish_direction">
                                        <option disabled>اختر</option>
                                        @foreach ($category->finishDirections as $finish_direction)
                                            <option value="{{ $finish_direction->id }}">{{ $finish_direction->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr> -->
                            <!-- <tr>
                                <td>التقفيل</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="finish_option">
                                        <option disabled>اختر</option>
                                         @foreach ($category->finishOptions as $finish_option)
                                            <option value="{{ $finish_option->id }}">{{ $finish_option->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr> -->
                            <tr>
                                <td>ملاحظات</td>
                                <td>
                                    <textarea class="form-control rounded-0" rows="5" name="notes">
                 </textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <div class="btn_form">
                        <button class="btn add-cart item_add">اضافة للسلة</button>
                    </div>
            </div>
            </form>
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

        $('#paper_type').on('change', function() {

            var x = parseInt(document.getElementById("paper_type").value);
            var arr = [2, 9, 4, 5, 7, 12, 13, 14, 15, 16, 67];
            // alert(jQuery.inArray(16,arr) >-1)
            console.log(typeof(x))
            console.log(arr.includes(x))
            if (arr.includes(x)) {
                console.log(x + " in array " + arr)
                document.getElementById('div10').style.display = 'none';
                document.getElementById('div2').style.display = 'none';
            } else {
                console.log(x + " not in array " + arr)
                document.getElementById('div10').style.display = 'block';
                document.getElementById('div2').style.display = 'block';
            }
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