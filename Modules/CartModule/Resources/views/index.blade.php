@extends('layoutmodule::public.inner_template')

@section('title')
My Cart
@endsection

@section('blog-title')
My Cart
@endsection

@section('content')

@php
$arr_cart = $arr_cart_products = [];
if(Session::has('CART')){
$arr_cart = json_decode(Session::get("CART"), true) ;
if(key_exists('products',$arr_cart))
$arr_cart_products = $arr_cart['products'] ;
}
@endphp


<div class="row justify-content-center">
    <div class="col-xs-12 col-md-12 col-lg-12 col-md-auto">
        <div class="tt-post-single">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col">
                    @include('layoutmodule::public.flash')
                </div>
            </div>
            <h1 class="tt-title-subpages noborder">MY SHOPPING CART</h1>

            @if(count($arr_cart_products) > 0)
            <div class="row">
                <div class="col-sm-12 col-xl-8">
                    <div class="tt-shopcart-table">
                        <table>
                            <tbody>
                                @foreach ($arr_cart_products as $pid=>$item)
                                <tr class="prod{{$pid}}" id="pr{{$pid}}">
                                    <td>
                                        <div class="tt-product-img">
                                            <img src="{{asset('assets/images/loader.svg')}}"
                                                data-src="{{url($item['img'])}}" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <h2 class="tt-title">
                                            <a href="{{ route('products.show',$pid) }}">{{$item['name']}}</a>
                                        </h2>
                                    </td>
                                    <td>
                                        <div class="tt-price">
                                            @php
                                            $currency = \Modules\SettingModule\Entities\Setting::where('id',1)->pluck('currency')->first();
                                            @endphp
                                            {{$currency}}  {{$item['price']}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="detach-quantity-desctope">
                                            <div class="tt-input-counter style-01">
                                                <span class="minus-btn"></span>
                                                <input type="text" name="quantity" value="{{$item['quantity']}}"
                                                    size="5" class="prodQuantity" id="p_{{$pid}}"
                                                    data-val='<?php echo json_encode(['id'=>$pid,'name'=>$item['name'],'price'=>$item['price'],'image'=>$item['img']]); ?>'>
                                                <span class="plus-btn"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tt-price subtotal">
                                            @php
                                            $currency = \Modules\SettingModule\Entities\Setting::where('id',1)->pluck('currency')->first();
                                            @endphp
                                           {{$currency}} <span class="prod-tot-price">{{$item['price'] * $item['quantity']}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="tt-btn-close" id="{{$pid}}"></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="tt-shopcart-btn">
                            <div class="col-left">
                                <a class="btn-link" href="{{url('/')}}"><i class="icon-e-19"></i>CONTINUE SHOPPING</a>
                            </div>
                            {{-- <div class="col-right">
                                <a class="btn-link" href="#"><i class="icon-h-02"></i>CLEAR SHOPPING CART</a>
                                <a class="btn-link" href="#"><i class="icon-h-48"></i>UPDATE CART</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-4">
                    <div class="tt-shopcart-wrapper">
                        {{-- <div class="tt-shopcart-box">
                            <h4 class="tt-title">
                                ESTIMATE SHIPPING AND TAX
                            </h4>
                            <p>Enter your destination to get a shipping estimate.</p>

                        </div> --}}

                        <div class="tt-shopcart-box tt-boredr-large">
                            <table class="tt-shopcart-table01">
                                <tbody>
                                    <tr>
                                        <th>SUBTOTAL</th>
                                        @php
                                        $currency = \Modules\SettingModule\Entities\Setting::where('id',1)->pluck('currency')->first();
                                        @endphp
                                        <td>{{$currency}}  <span class="cart-tot-amount">{{$arr_cart['total']}}</span></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>GRAND TOTAL</th>
                                        @php
                                        $currency = \Modules\SettingModule\Entities\Setting::where('id',1)->pluck('currency')->first();
                                        @endphp
                                        <td>{{$currency}}  <span class="cart-tot-amount">{{$arr_cart['total']}}</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <a href="{{route('buy.delivery.methods')}}" class="btn btn-lg">
                                <span class="icon icon-check_circle"></span>
                                PROCEED TO CHECKOUT
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


@push('scripts')

@endpush


@endsection