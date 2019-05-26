@extends('layouts.app')
@section('title','Elina product')

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
<div class="product-item">
    <div class="product-item__title ml-1 mt-2">
        <p style="font-size:1.3em;" class="px-2 text-left">Section<i style="color:rebeccapurple" class="fas fa-chevron-right"></i>Category<i style="color:rebeccapurple" class="fas fa-chevron-right"></i>Name product</p>
    </div>
    <hr>
    <div class="row d-flex mb-3" style="height:55vh;">
    {{--<div class="product-item__image-pack" style="height:50vh;">--}}
        <div class="column col-2 product-item__thumbnails">
            <img class="col-12" id="img-1" src="{{ asset('img/200.png') }}" onclick='changeMainImage(id)'>
            <img class="col-12" id="img-2" src="{{ asset('img/news/Ocean-Water-Wave-Art-Blue-Concept-Dark.jpg') }}" onclick='changeMainImage(id)'>
        </div>
        <div class="column col-5">
            <img id="main_img" class="d-inline-flex" style="height:45vh;width:auto;max-width:45vw;" src="{{ asset('img/news/Ocean-Water-Wave-Art-Blue-Concept-Dark.jpg') }}">
        </div>
        <div class="product-item__desc-preview column col-4">
            <p style="font-size:1.3em;" class="px-2 text-left">Name product</p>
            <hr class="col-12">
            <div class="rgba-grey-light p-1">
                <p>By/От Manuf</p>
                <p><a class="right">4 reviews</a></p>
                <p>В наличии/нет в наличии</p>
                <p>Срок годности</p>
                <p>Количество <button>-</button> 1 <button>+</button>
                    <button type="button" class="btn deep-purple">Добавить в корзину</button>
                </p>
            <div class="product-item__price">
                <h5>Цена: <span>price </span> <span>RUB/рубл</span></h5>
            </div>
            </div>
        </div>
    {{--</div>--}}
    </div>
    <hr>
    <div class="col-11 mx-2 product-item__details">
        <div class="product-item__description">
            <h4>Описание название</h4>
            <p> Описание подробно </p>

        </div>
        <div class="product-item__description">
            <h4>Применение название</h4>
            <p> Применение подробно </p>
        </div>
        <div class="product-item__description">
            <h4>Ингредиенты название</h4>
            <p> Ингредиенты подробно </p>
        </div>
    </div>
</div>

    <script type="text/javascript">
        function changeMainImage(id){
            var src=$('#' + id).attr('src');
            var main_img=$('#main_img');
            var main_src=main_img.attr('src');
            if(src != main_src){
                main_img.attr("src", src);
            }
        }
    </script>

@endsection