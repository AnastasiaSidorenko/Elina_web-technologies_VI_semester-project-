@extends('layouts.app')
@section('title','Main page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="container">
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
                @foreach ($news as $item)
                        <div class="card news_item d-flex">
                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <h4 class="card-title"><?php
                                    echo "<p class='card-text'>{{$item->$title}}</p>";
                                    ?></h4>
                                <hr>
                                <!-- Text -->
                                <?php
                                echo "<p class='card-text'>{{$item->$body}}</p>";
                                ?>
                            </div>

                            <!-- Card footer -->
                            <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                                <ul class="list-unstyled list-inline font-small">
                                    <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>{{$item->date}}</li>
                                </ul>
                            </div>

                        </div>
                        <!-- Card -->
                @endforeach
            </div>
        </div>
        </div>
    </div>
@endsection