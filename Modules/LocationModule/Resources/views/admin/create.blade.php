@extends('layoutmodule::admin.main')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>اضافة محافظة جديد</h3>
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
                        <label class="control-label col-md-3 col-sm-3" style="float: right;">الاسم</label>
                        <div class="col-md-7 col-sm-7 ">
                            <input type="text" class="form-control" name="name" required="required" placeholder="الاسم">
                        </div>

                    </div>

                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3" style="float: right;"> الكود </label>
                        <div class="col-md-7 col-sm-7 ">
                            <input type="text" class="form-control" name="alias" required="required" placeholder="الكود">
                        </div>

                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3" style="float: right;">سعر الشحن</label>
                        <div class="col-md-7 col-sm-7 ">
                            <input type="text" class="form-control" name="shipping_price" required="required" placeholder="سعر الشحن لاول 1000">
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