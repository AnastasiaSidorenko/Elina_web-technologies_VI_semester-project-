@extends('layouts.app')
@section('title','User Account')
{{--@section('js')
   --}}{{--smth--}}{{--
@endsection--}}

@section('content')
<!--    --><?php
//    session_start();
//    if(App::getLocale()=='en'){
//
//    }
//    else{
//
//    }
//    ?>
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
            <p>2 заказа табличкой</p>
            <a href="#">{{ trans('user.see_all') }}</a>
        </div>
        <div>
            <hr>
            <a href="#">{{ trans('user.reviews') }}</a>
        </div>
    </div>
</div>
@endsection