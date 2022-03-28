@extends('layoutmodule::admin.main')

@section('content')
<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">عملائنا
                <i class="fa fa-users float-right" aria-hidden="true"></i>
            </h3>
            <h5 class="card-text">{{count($clients)}}</h5>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
    </div>
</div>

<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">المنتجات
                <i class="fa fa-tags float-right" aria-hidden="true"></i>
            </h3>
            <h5 class="card-text">{{count($categories)}}</h5>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
    </div>
</div>

<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">المحافظات
                <i class="fa fa-map-marker float-right" aria-hidden="true"></i>
            </h3>
            <h5 class="card-text">{{count($cities)}}</h5>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
    </div>
</div>

<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">الطلبات
                <i class="fa fa-shopping-bag float-right" aria-hidden="true"></i>
            </h3>
            <h5 class="card-text">{{count($orders)}}</h5>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
    </div>
</div>
@endsection