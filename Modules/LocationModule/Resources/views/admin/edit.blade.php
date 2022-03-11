@extends('layoutmodule::admin.main')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3> تعديل لمحافظة</h3>
    </div>

</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">

                <a href="add_new_item.html" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> اضافة محافظة جديد </a>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <!-- <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button> -->

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <!-- start project list -->
                <table class="table table-striped projects">
                    <thead>
                        <tr>

                            <th>الاسم </th>
                            <th>الكود</th>

                            <th>سعر الشحن </th>

                        </tr>
                    </thead>
                    <tbody>
                        <form method="post" action="{{route('admin.cities.update')}}">
                            @csrf
                        <tr>
                            <td>
                                <input type="hidden" name="id" value="{{$city->id}}">
                                <input type="text" class="form-control" required="required" name="name"  value="{{$city->name}}">
                            </td>
                            <td>
                                <input type="text"  class="form-control" name="alias" required="required" value="{{$city->alias}}">
                            </td>
                            <td>
                                <input type="number" step="1" min="1" class="form-control" name="shipping_price" required="required" value="{{$city->shipping_price}}">
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