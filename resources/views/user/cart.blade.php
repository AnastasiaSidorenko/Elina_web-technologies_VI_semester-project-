@extends('layouts.app')

@section('content')
    <div class="card m-4">
    {{--<div class="container mt-2" style="width:90vw;">--}}
        <div class="rgba-grey-light card-header"><h4>{{ trans('user.cart') }} ({{$quantity}})</h4>
        </div>
        @if($quantity>0)
            <div class="card-body text-center">
                @foreach($cart_products as $item)
                @endforeach
            </div>
        <div class="cart__sum text-right">
            <p>{{ trans('user.total_sum') }} :
                {{$total_sum}} {{ trans('product.RUB') }}
        </div>
        @endif
    </div>
@endsection