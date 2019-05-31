@extends('layouts.app')
@section('title',trans('title.account') )
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
    <h4>{{  trans('user.account_info') }}</h4>
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
            <h4><a href="/user/account/{{$user->id}}/orders">{{ trans('user.orders') }}</a></h4>
        </div>
        {{--<div>
            <hr>
            <h4><a href="/user/account/1/reviews">{{ trans('user.reviews') }}</a></h4>
        </div>--}}
    </div>
</div>
@endsection