@extends('layouts.app')
@section('title','About us')

@section('content')
    <div id="divContent">
        <h1 class="text-center mt-3 mb-3">{{ trans('about_us.title') }}</h1>
        <div class="image-center">
            <img src="http://fancy-beauty.com/wp-content/uploads/2018/04/DSC9705.jpg" alt="products">
        </div>
    </div>
@endsection