@extends('layouts.app')
@section('title','User Account')
{{--@section('js')
   --}}{{--smth--}}{{--
@endsection--}}

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

<div class="container">
    <h3 class="text-center">{{  trans('user.account') }}</h3>
    <h5>{{  trans('user.account_info') }}</h5>
    <div class="account_info row">
        <div class="column pr-2">
            <p>{{ trans('user.fio') }}</p>
            <p>{{ trans('user.email') }}</p>
            <p>{{ trans('user.phone') }}</p>
        </div>
        <div class="column">
            <p>{{$user->fio}}</p>
            <p>{{$user->email}}</p>
            <p>{{$user->phone}}</p>
        </div>
    </div>
    <div class="Orders_reviews">
        <div class="orders__preview">
            <hr>
            <h6><a href="#">{{ trans('user.orders') }}</a></h6>

            <div class="card-body text-center">
                <table  id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr><th>{{ trans('order.product_name') }}</th><th>{{ trans('order.image') }}</th><th>{{ trans('order.quantity') }}</th></tr>
                    </thead>
                    <tbody>
                    {{--@if($m->id!=Auth::user()->id)--}}
                    @foreach($order as $product)
                        <tr>
                            <td>{{$product->manuf_name}},{{$m->name}}</td>
                            <td><img height=40px src="{{$m->image}}"></td>
                            <td>{{$m->quantity}}</td>
                            <td>{{$m->quantity}}*{{$m->order_product_price}}</td>
                        </tr>
                        {{--   @endif--}}
                    @endforeach
                    <p class="text-right">{{ trans('order.total_price') }} {{$m->total_price}}</p>
                    </tbody>
                </table>
            </div>

            <a href="#">{{ trans('user.see_all') }}</a>
        </div>
        <div>
            <hr>
            <a href="#">{{ trans('user.reviews') }}</a>
        </div>
    </div>
</div>
@endsection