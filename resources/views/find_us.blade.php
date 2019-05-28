@extends('layouts.app')
@section('title','Find us')

@section('content')
    <div id="divContent">
        <h1 class="text-center mt-3 mb-5">{{ trans('find_us.title') }}?</h1>
        <div class="row">
            <div class="col-md-3 mb-md-0 mb-3 column ml-5" >
                <div class="z-depth-1-half map-container mb-4" style="height: 300px">
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A6b6d287efa7c2ed3ba945378d5d116b40f6394d00a84b5c51366642736f57b90&amp;source=constructor" width="335" height="300" frameborder="0"></iframe>
                </div>
            </div>
            <div class="column">
                <h4>{{ trans('find_us.title_office') }}:</h4>
                <h5 class="mt-4"><i class="fas fa-home mr-3 "></i>{{ trans('find_us.city') }}</h5>
                <h4 class="mt-5">{{ trans('find_us.mail') }}:</h4>
                <h5 class="mt-4"><i class="fas fa-envelope mr-3"></i>info@example.com</h5>
                <h5 class="mt-4"><i class="fas fa-phone mr-3"></i> + 01 234 567 88</h5>
            </div>
        </div>
    </div>
@endsection