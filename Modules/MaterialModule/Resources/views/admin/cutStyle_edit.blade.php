@extends('layoutmodule::admin.main')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3> تعديل المنتج</h3>
    </div>

</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">

                <a href="add_new_item.html" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> اضافة منتج جديد </a>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <!-- start project list -->
                <table class="table table-striped projects">
                    <thead>
                        <tr>

                            <th>الاسم </th>
                            <!-- <th>السعر</th> -->

                            <th>الحالة </th>

                        </tr>
                    </thead>
                    <tbody>
                        <form method="post" action="{{route('admin.material.cutStyle.update')}}">
                            @csrf
                        <tr>
                            <td>
                                <input type="hidden" name="id" value="{{$cutStyle->id}}">
                                <input type="text" class="form-control" required="required" name="name"  value="{{$cutStyle->name}}">
                            </td>
                            <!-- <td>
                                <input type="number" step="0.1" class="form-control" name="price" required="required" value="{{--$color->price--}}">
                            </td> -->
                            <td>
                                <div class="col-md-6 col-sm-6 " dir="rtl" lang="ar">
                                    <input type="radio" class="flat" name="is_available"  value="1" checked="" required /> متاح
                                    <input type="radio" class="flat" name="is_available"  value="0" /> غير متاح
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>

                                <button type="submit" class="btn btn-success float-right">تعديل</button>

                            </td>

                        </tr>
                        </form>

                    </tbody>
                </table>
                <!-- end project list -->

            </div>
        </div>
    </div>
</div>

@endsection