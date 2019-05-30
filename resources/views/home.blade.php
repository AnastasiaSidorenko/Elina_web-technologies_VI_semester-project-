@extends('layouts.app')
@section('title','Elina shop')
@section('content')
    <main>
    {{--<div class="row d-flex justify-content-center">
        <div class="image-center">
            <img style="height:400px" class="mt-2"  src="https://www.fabulous-stives.co.uk/wp-content/uploads/2018/03/WELCOME-ST-IVES.jpg" alt="image">
        </div>

    </div>--}}<div class="row d-flex justify-content-center">
        <div id="carouselExampleControls" class="d-inline-flex col-5 mt-2 carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="/news/{{$news[0]->id}}"><img width="600" class="d-block" src="{{asset('/img/news/'.$news[0]->image)}}"
                                                    alt="First slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="/news/{{$news[1]->id}}"><img width="600" class="d-block" src="{{asset('/img/news/'.$news[1]->image)}}"
                                                          alt="Second slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="/news/{{$news[2]->id}}"><img width="600" class="d-block" src="{{asset('/img/news/'.$news[2]->image)}}"
                                                          alt="Third slide"></a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> </div>
    </main>
@endsection
