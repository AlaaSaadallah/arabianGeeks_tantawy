@extends('layoutmodule::admin.main')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>اضافة عميل جديد</h3>
    </div>


</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">

            <div class="x_content">

                <!-- start project list -->
                <form class="form-horizontal form-label-left" dir="rtl" lang="ar" action="{{--route('')--}}">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3" style="float: right;">اسم العميل</label>
                        <div class="col-md-7 col-sm-7 ">
                            <input type="text" class="form-control" name="name" required="required" placeholder="اسم العميل">
                        </div>

                    </div>


                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 " style="float: right;">المحافظة</label>
                        <div class="col-md-7 col-sm-7 ">
                            <select class="select2_multiple form-control" required="required" name="city_id">
                                <option>Choose option</option>
                                <option value="">Option one</option>
                                <option>Option two</option>

                            </select>
                        </div>

                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3" style="float: right;"> العنوان </label>
                        <div class="col-md-7 col-sm-7 ">
                            <input type="text" class="form-control" name="address" required="required" placeholder="العنوان">
                        </div>

                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3" style="float: right;"> رقم التليفون</label>
                        <div class="col-md-7 col-sm-7 ">
                            <input type="text" class="form-control" name="phone" required="required" placeholder="رقم التليفون ">
                        </div>

                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3" style="float: right;">اسم الدخول</label>
                        <div class="col-md-7 col-sm-7 ">
                            <input type="text" class="form-control" name="email" required="required" placeholder="اسم الدخول">
                        </div>

                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3" style="float: right;">الرقم السرى</label>
                        <div class="col-md-7 col-sm-7 ">
                            <input type="text" class="form-control" name="password" required="required" placeholder="الرقم السرى">
                        </div>

                    </div>


                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">

                            <button class="btn btn-primary" type="reset">إعادة تعيين</button>
                            <button type="submit" class="btn btn-success">اضافة</button>
                        </div>
                    </div>

                </form>
                <!-- end project list -->

            </div>
        </div>
    </div>
</div>

@endsection