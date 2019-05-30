@extends('layouts.app')

@section('js')
    <script type="text/javascript" src="{{ asset('js/WriteReview.js') }}"></script>
@endsection

@section('content')
    <?php
    $lang=App::getLocale();
    if($lang=='en'){
        $name = 'name_en';
    }
    else{
        $name = 'name_ru';
    }
    ?>

<div class="container">
    <div class="pl-3">
        <i style="color:rebeccapurple" class="fas fa-chevron-left"></i>
        <span style="font-size:1.3em;" class="pl-1 text-left"><a href="{{ url()->previous() }}">{{ trans('product.back') }}</a></span>
    </div>
    <div class="row my-3">
        <div class="product__image col-2">
            <img src="{{$product->image1}}" style="width:100%;height:auto">
        </div>
        <div class="col-9">
            <h4>{{$product->manuf_name}},{{$product->$name}}</h4>
            <hr><p>
            <h5>{{trans('product.write a review')}}
            </h5>
            <textarea name="review-body" id="review-body" rows=10 cols=80 style="resize: none;"></textarea>
            <hr>
            <button id="SubmitReview" onclick="post_review({{$product->id}},{{Auth::user()->id}},'{{$lang}}')" type="button" class="btn" style="background-color:#f5b054;">{{trans('product.submit_review')}}</button>
            <span id="caption"></span>
        </div>
    </div>
</div>

@endsection
