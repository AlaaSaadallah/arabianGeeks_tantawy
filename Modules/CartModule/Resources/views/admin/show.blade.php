@extends('layoutmodule::admin.main')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>بيانات الطلب </h3>
    </div>


</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">

            <div class="x_content">
                <!-- start project list -->
                <table class="col-6">
                    <tr>
                        <td>{{$item->customer->name}}
                            <br>
                            {{$item->customer->phone}}
                            <br>
                            {{$item->customer->address}}
                        </td>
                        <td>بيانات العميل</td>
                    </tr>
                    <tr>
                        <td>{{$item->category}}</td>
                        <td>المنتج</td>
                    </tr>
                    <tr>
                        <td><img src="{{$item->imagePath}}"></td>
                        <td>التصميم</td>
                    </tr>
                    @if($item->paper_type != null)
                    <tr>
                        <td>{{$item->paper_type}}</td>
                        <td>نوع الورق</td>
                    </tr>
                    @endif
                    @if($item->paper_size != null)
                    <tr>
                        <td>{{$item->paper_size}}</td>
                        <td>مقاس الورق</td>
                    </tr>
                    @endif
                    @if($item->quantity != null)
                    <tr>
                        <td>{{$item->quantity}}</td>
                        <td>الكمية</td>
                    </tr>
                    @endif
                    @if($item->inner_quantity != null)
                    <tr>
                        <td>{{$item->inner_quantity}}</td>
                        <td>عدد الورق الداخلي</td>
                    </tr>
                    @endif
                    @if($item->print_option != null)
                    <tr>
                        <td>{{$item->print_option}}</td>
                        <td>شكل الطباعة</td>
                    </tr>
                    @endif
                    @if($item->front_color != null)
                    <tr>
                        <td>{{$item->front_color}}</td>
                        <td>عدد الوان الوجه</td>
                    </tr>
                    @endif
                    @if($item->back_color != null)
                    <tr>
                        <td>{{$item->back_color}}</td>
                        <td>عدد الوان الظهر</td>
                    </tr>
                    @endif
                    @if($item->cut_style != null)
                    <tr>
                        <td>
                            @if($item->cut_style ==1)
                            عادي
                            @elseif($item->cut_style == 2)
                            كيرف
                            @endif

                        </td>
                        <td>شكل القص</td>
                    </tr>
                    @endif
                    @if($item->cut_number != null)
                    <tr>
                        <td>{{$item->cut_number}}</td>
                        <td>عدد القص</td>
                    </tr>
                    @endif
                    @if($item->zigzag != null)
                    <tr>
                        <td>{{$item->zigzag}}</td>
                        <td>الشرشرة</td>
                    </tr>
                    @endif
                    @if($item->rega != null)
                    <tr>
                        <td>{{$item->rega}}</td>
                        <td>الريجة</td>
                    </tr>
                    @endif
                    @if($item->solovan != null)
                    <tr>
                        <td>{{$item->solovan}}</td>
                        <td>السلوفان</td>
                    </tr>
                    @endif
                    @if($item->cover_paper_type != null)
                    الغلاف
                    <tr>
                        <td>{{$item->cover_paper_type}}</td>
                        <td>نوع ورق </td>
                    </tr>
                    @endif
                    @if($item->cover_print_option != null)
                    <tr>
                        <td>{{$item->cover_print_option}}</td>
                        <td>شكل الطباعة</td>
                    </tr>
                    @endif
                    @if($item->cover_front_color != null)
                    <tr>
                        <td>{{$item->cover_front_color}}</td>
                        <td>عدد الوان الوجه</td>
                    </tr>
                    @endif
                    @if($item->cover_back_color != null)
                    <tr>
                        <td>{{$item->cover_back_color}}</td>
                        <td>عدد الوان الظهر</td>
                    </tr>
                    @endif
                    @if($item->cover_solovan != null)
                    <tr>
                        <td>{{$item->cover_solovan}}</td>
                        <td>السلفان</td>
                    </tr>
                    @endif
                    @if($item->cover_rega != null)
                    <tr>
                        <td>{{$item->cover_rega}}</td>
                        <td>الريجة</td>
                    </tr>
                    @endif
                    @if($item->cover_finish_option != null)
                    <tr>
                        <td>{{$item->finish_option}}</td>
                        <td>التقفيل</td>
                    </tr>
                    @endif
                    @if($item->cover_finish_direction != null)
                    <tr>
                        <td>{{$item->finish_direction}}</td>
                        <td>جهة التقفيل</td>
                    </tr>
                    @endif
                    <tr>
                        <td>{{$item->notes}}</td>
                        <td>الملاحظات</td>
                    </tr>
                    <tr>
                        <td>{{$item->shipping}}</td>
                        <td>الشحن</td>
                    </tr>
                    <tr>
                        <td>{{$item->total_price}}</td>
                        <td>اجمالي الطلب</td>
                    </tr>
                </table>
                <!-- end project list -->

            </div>
        </div>
    </div>
</div>

@endsection