@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{ asset('js/Cart.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>

@endsection
@section('content')

    <?php

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

            <div class="card-body text-center">
                <table  id="dtHorizontalVerticalExample" class="table table-striped table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th width="10%"></th><th width="40%">{{ trans('user.products') }}</th><th>{{ trans('user.price') }}</th><th>{{ trans('user.qty') }}</th><th>{{ trans('user.total') }}</th><th width="5%"></th></tr>
                    </thead>
                    <tbody>@foreach($cart_products as $item)
                        {{--@if($m->id!=Auth::user()->id)--}}
                        <tr id='TR{{$item->id}}'>
                            <td><img height="50px" src="{{$item->image1}}"></td>
                            <td class="text-left">{{$item->$name}}</td>
                            <td id="price{{$item->id}}">{{ $item->price }}</td>
                            <td><button id="minus{{$item->id}}" onclick="Minus({{$item->product_quantity}},{{$item->id}},{{$item->id_product}},{{$item->user_id}})">-</button><span id="countProduct{{$item->id}}">  {{ $item->quantity }} </span><button id="plus{{$item->id}}" onclick="Plus({{$item->product_quantity}},{{$item->id}},{{$item->id_product}},{{$item->user_id}})">+</button></td>
                            <td id="total_sum{{$item->id}}">{{ $item->price*$item->quantity }}</td>
                            <td><button id='BT{{$item->id}}' onclick='deleteItem({{$item->id}},{{$item->id_product}},{{$item->user_id}})'><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                        {{--   @endif--}}
                    @endforeach
                    </tbody>
                </table>

            </div>
            {{$cart_products->links()}}
            <div class="cart__sum text-right">
            <p>{{ trans('user.total_sum') }} :
                <span id="Total">{{$total_sum}}</span> {{ trans('product.RUB') }}
            </div>
        @endif
    </div>
@endsection