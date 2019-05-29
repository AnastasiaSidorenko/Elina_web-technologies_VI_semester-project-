@extends('layouts.app')

@section('content')

    <?php
    session_start();
    if(App::getLocale()=='en'){
        $name='name_en';
    }
    else{
        $name='name_ru';
    }
    ?>

    <div class="card m-4">
    {{--<div class="container mt-2" style="width:90vw;">--}}
        <div class="rgba-grey-light card-header"><h4>{{ trans('user.cart') }} ({{$quantity}})</h4>
        </div>
        @if($quantity>0)
            <div class="cart__items-header row">
                <div class="col-xs-14 col-sm-14 col-md-12">{{ trans('user.products') }}</div>
                <div class="col-xs-3 col-sm-4 col-md-6 text-center">{{ trans('user.price') }}</div>
                <div class="col-xs-3 col-sm-3 col-md-3 text-center">{{ trans('user.qty') }}</div>
                <div class="col-xs-3 col-sm-3 col-md-3 text-right">{{ trans('user.total') }}</div>
            </div>
                @foreach($cart_products as $item)
            <div class="cart__items row">
                <div class="col-xs-14 col-sm-14 col-md-12">{{$cart_products->$name}}</div>
                <div class="col-xs-3 col-sm-4 col-md-6 text-center">{{ $cart_products->$price}}</div>
                <div class="col-xs-3 col-sm-3 col-md-3 text-center">{{ $cart_products->$cart_item_quantity }}</div>
                <div class="col-xs-3 col-sm-3 col-md-3 text-right">{{ $cart_products->$cart_item_total }}</div>
            </div>
                @endforeach
        <div class="cart__sum text-right">
            <p>{{ trans('user.total_sum') }} :
                {{$total_sum}} {{ trans('product.RUB') }}
        </div>
        @endif
    </div>
@endsection