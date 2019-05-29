@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{ asset('js/Cart.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>

@endsection
@section('content')

    <?php
    session_start();
    if(App::getLocale()=='en'){
        $name='name_en';
    }
    else{
        $name='name_ru';
    }
    $manuf_name='manufacturers.name';
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
                    <div class="show-product col-xs-14 col-sm-14 col-md-12">{{$item->$manuf_name}},{{$item->$name}}</div>
                    <div class="col-xs-3 col-sm-4 col-md-6 text-center">{{ $item->price }}</div>
                    <div class="col-xs-3 col-sm-3 col-md-3 text-center">{{ $item->quantity }}</div>
                    <div class="col-xs-3 col-sm-3 col-md-3 text-right">{{ $item->$cart_item_total }}</div>
                </div>
            @endforeach
            <div class="cart__sum text-right">
                <p>{{ trans('user.total_sum') }} :
                {{$total_sum}} {{ trans('product.RUB') }}
            </div>
        @endif
    </div>
@endsection