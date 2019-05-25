@extends('layouts.app')
@section('title','News page')

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

                <div class="row justify-content-center" style="width:100vw">
                @foreach ($news as $item)
                    <!-- Card Light -->
                        <div class="card mt-3 news__item ml-3 mr-2">
                            {{--style="width:45vw"--}}

                            <!-- Card image -->
                            <div class="view overlay justify-content-center d-flex">

                                <img class="card-img-top news__preview-image"  src="{{asset('/img/news/'.$item->image.'')}}" alt="news_image">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <a href="/news/{{$item->id}}"><h4 class="card-title">{{$item->$title}}</h4></a>
                                <p class="font-weight-bold dark-grey-text text-right">{{$item->date}}</p>
                                <hr>
                                <!-- Text -->
                                <p class="card-text news__text-preview">{{$item->$body}}</p>
                                <!-- Link -->
                                <a href="/news/{{$item->id}}" class="text-deep-purple d-flex justify-content-end"><h5>{{ trans('site.read_more') }} <i class="fas fa-angle-double-right"></i></h5></a>

                            </div>
                        </div>
                @endforeach
                </div>
                    <div class="d-flex justify-content-center mt-3">
                    {{$news->links()}}
            </div>
@endsection