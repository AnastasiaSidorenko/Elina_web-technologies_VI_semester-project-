@extends('layouts.app')
@section('title','Elina News')

@section('content')
    <?php
    session_start();
    if(App::getLocale()=='en'){
        $body='body_en';
        $title='title_en';
    }
    else{
        $body='body_ru';
        $title='title_ru';
    }
    ?>

    <div class="slide-wrap">

        <a href="#slide-1">1</a>
        <div class="slider">
            <div class="slide" id="slide-1"><img class="logo__img d-inline-flex" src="{{ asset('img/200.png') }}"></div>
            <div class="slide" id="slide-2"><img class="logo__img d-inline-flex" src="{{ asset('img/news/Ocean-Water-Wave-Art-Blue-Concept-Dark.jpg') }}"></div>
        </div>
        <a href="#slide-2">2</a>

    </div>

@endsection