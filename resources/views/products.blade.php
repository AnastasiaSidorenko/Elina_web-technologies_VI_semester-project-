@extends('layouts.app')
@section('title',trans('title.products') )
@section('js')
    <script src="{{ asset('js/ProductItem.js') }}"></script>
@endsection

@section('content')
    <?php
    session_start();
    if(App::getLocale()=='en'){
        $name='name_en';
        $section_name = 'section_name_en';
        $category_name='category_name_en';
    }
    else{
        $name='name_ru';
        $section_name = 'section_name_ru';
        $category_name='category_name_ru';
    }
    $cat_id = 'category_id';
    $sec_id = 'section_id';
    $manuf_name = 'manufacturer_name';
    $lang = App::getLocale();
    ?>

    @if($products)
    @if(isset($in_section))
        <div class="product-item__title ml-1 mt-2">
            <p style="font-size:1.3em;" class="px-2 text-left"><a href="/products/{{$products[0]->$sec_id}}">{{$products[0]->$section_name}}</a>
        </div>
    @elseif(isset($in_category))
        <div class="product-item__title ml-1 mt-2">
            <p style="font-size:1.3em;" class="px-2 text-left"><a href="/products/{{$products[0]->$sec_id}}">{{$products[0]->$section_name}}</a>
                <i style="color:rebeccapurple" class="fas fa-chevron-right"></i>
                <a href="/products/category/{{$products[0]->category_id}}">{{$products[0]->$category_name}}</a>
        </div>
    @endif
    <div>
    <div class="rgba-grey-light p-1 mb-2 d-flex justify-content-end">
        {{--<span>{{ trans('product.sort_by') }} </span>--}}
        {{--<select id="selectSort" class="dropdown-sort px-2 mx-2" onChange="makeSort();">--}}
            {{--<option value="Default"></option>--}}
            {{--<option value="Cheapest">{{ trans('product.price:cheap') }}</option>--}}
            {{--<option value="Exspensive">{{ trans('product.price:exspensive') }}</option>--}}
            {{--<option value="Newest">{{ trans('product.newest') }}</option>--}}
        {{--</select>--}}
    </div>

    <div class="products col-11">
        <div class="row ml-2">
        @foreach($products->chunk(4) as $products_row)
            <div class="row">
            @foreach ($products_row as $product)
                <div class="col-3 products__item" style="height:60vh;">
                    <img class="mt-1" src={{$product->image1}} style="height:14em;width:auto;">
                    <div class="show_product"><p><a href="/product/{{$product->id}}">{{$product->$manuf_name}},{{$product->$name}}</a>
                    </div>
                       <br><div class="d-inline-flex align-self-bottom">
                        <span>{{$product->price}} {{ trans('product.RUB') }}</span><span class="ml-3" id="allRight{{$product->id}}" style="color:red"></span>
                    </div>
                        @auth
                            <div>
                            <button id="addInCart" onclick="AddInCart({{$product->id}},{{Auth::user()->id}},'{{$lang}}')" type="button" class="btn btn btn-lg mb-auto d-inline-flex align-self-end deep-purple">{{ trans('product.add_to_cart') }}</button>
                            </div>
                                <span id="countProduct" hidden> 1 </span>
                        @else
                            <button type="submit" onclick="location.href='/user/login'" class="btn btn-lg mb-auto d-inline-flex align-self-end deep-purple">{{ trans('product.add_to_cart') }}</button>
                        @endauth
                </div>
            @endforeach
            </div>
        @endforeach
        </div>
    </div>
        <div class="d-flex justify-content-center mt-3">
            {{$products->links()}}
        </div>
    </div>
    @else
        <div class="d-flex justify-content-center" style="height:50vh;"><h3 class="align-self-center">{{trans('product.no_products')}}</h3></div>
    @endif
@endsection