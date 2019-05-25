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
    <div class="m-2 mb-0">
        <div class="justify-content-center" style="background-color:#6E6BAD;">
            <p class="align-self-center news-item__title white-text text-center">
                {{$news_item->$title}}
            </p>
        </div>
        <div class="pl-2">
            <div class="row">
                <div class="col-4">
                    <img class="news-item__image" src="{{asset('/img/news/'.$news_item->image.'')}}" alt="news_image">
                </div>
                <div class="news-item__text text-left d-inline col-8"><p>{{$news_item->$body}}</p></div>
             </div>
        </div>
        <p class="text-right font-weight-bolder" style="font-size:2vw">{{$news_item->date}}</p>
        </div>
@endsection