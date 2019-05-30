@extends('layouts.app')
@section('title','Elina product')
@section('js')
    <script type="text/javascript" src="{{ asset('js/ProductItem.js') }}"></script>
@endsection

@section('content')
    <?php
    if(App::getLocale()=='en'){
        $name = 'name_en';
        $category='category_name_en';
        $description='description_en';
        $suggested_use = 'suggested_use_en';
        $section_name = 'section_name_en';
    }
    else{
        $name = 'name_ru';
        $category='category_name_ru';
        $description='description_ru';
        $suggested_use = 'suggested_use_ru';
        $section_name = 'section_name_ru';
    }
    $manuf_name = 'manufacturer_name';
    $cat_id = 'category_id';
    $sec_id = 'section_id';
    ?>

   <div class="product-item">
    <div class="product-item__title ml-1 mt-2">
        <p style="font-size:1.3em;" class="px-2 text-left"><a href="/products/{{$product_item->$cat_id}}">{{$product_item->$section_name}}</a>
            <i style="color:rebeccapurple" class="fas fa-chevron-right"></i>
            <a href="/products/category/{{$product_item->category_id}}">{{$product_item->$category}}</a>
            <i style="color:rebeccapurple" class="fas fa-chevron-right"></i>
            {{$product_item->$name}}</p>
    </div>
    <hr>
    <div class="row d-flex mb-3" style="height:60vh;">
    <div class="row product-item__image-pack" style="height:50vh;">
        <div class="column col-2 product-item__thumbnails">
            <img class="col-12" id="img-1" src="{{$product_item->image1}}" alt="front-image" onclick='changeMainImage(id)'>
            <img class="col-12" id="img-2" src="{{$product_item->image2}}" alt="back-image" onclick='changeMainImage(id)'>
        </div>
        <div class="column col-5">
            <img id="main_img" class="d-inline-flex" src="{{$product_item->image1}}" style="height:58vh;width:auto;max-width:55vw;">
        </div>
        <div class="product-item__desc-preview column col-4">
            <h4 class="px-2 text-left">{{$product_item->$name}}</h4>
            <hr class="col-12">
            <div class="p-1">
                <p>{{ trans('product.by') }} {{$product_item->$manuf_name}}</p>
                <p><a class="right">{{ trans('product.reviews_q') }}
                        {{--{{$reviews_quantity}}--}}
                    </a></p>

                @if($product_item->quantity > 0)
                    <p>{{ trans('product.in_stock') }}</p>
                @else
                    <p>{{ trans('product.out_of_stock') }}</p>
                @endif
                <p>{{ trans('product.expiration_date') }} {{$product_item->expiration_date}}</p>
                <div class="product-item__p&c rgba-grey-light">
                    @if($product_item->quantity > 0)
                        <p>{{ trans("product.quantity") }} <button id="minus" onclick="Minus({{$product_item->quantity}})">-</button><span id="countProduct"> 1 </span><button id="plus" onclick="Plus({{$product_item->quantity}})">+</button>
                            @auth
                                <button id="addInCart" onclick="AddInCart({{$product_item->id}},{{$userID}})" type="button" class="btn deep-purple">{{ trans('product.add_to_cart') }}</button>
                            @else
                                <button type="submit" onclick="location.href='/user/login'" class="btn deep-purple">{{ trans('product.add_to_cart') }}</button>
                            @endauth
                    @endif
                <h5>{{ trans('product.price') }}: <span>{{$product_item->price}} </span><span>{{ trans('product.RUB') }}</span><span id="allRight{{$product_item->id}}" style="color:red"></span></h5>
            </div>
            </div>
        </div>
    </div>
    </div>
    <hr>
    <div class="col-11 mx-2 product-item__details">
        <div class="product-item__description">
            <h4>{{ trans('product.description') }}</h4>
            <p>{{$product_item->$description}}</p>

        </div>
        <div class="product-item__description">
            <h4>{{ trans('product.suggested_use') }}</h4>
            <p>{{$product_item->$suggested_use}}</p>
        </div>
        <div class="product-item__description">
            <h4>{{ trans('product.ingredients') }}</h4>
            <p>{{$product_item->ingredients}}</p>
        </div>
        <div class="product-item__reviews">
            <h4>{{ trans('product.reviews') }}</h4>
            <p>{{$product_item->ingredients}}</p>
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