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

@endsection