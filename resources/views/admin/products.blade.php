@extends('admin.layout.auth')

@section('js')
    <script type="text/javascript" src="{{ asset('js/Products.js') }}"></script>
@endsection

@section('content')
    <?php
    session_start();
        $lang=App::getLocale();
    ?>
    <div class="container" style="width:100%">
        <div class="row justify-content-center">
            <div class="{{--col-md-12--}}" >
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.products') }}</span>
                        <button type="button" class="btn btn-amber pull-right" data-toggle="modal" data-target="#addArticle">
                            {{ trans('admin.create') }}
                        </button>
                    </div>
                    <div class="card-body text-center" style="overflow-x:auto;">
                        <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <tr>
                                <th>ID</th><th>{{ trans('product.name') }} RU</th><th>{{ trans('product.name') }} EN</th>
                                <th>{{ trans('product.description') }} RU</th><th>{{ trans('product.description') }} EN</th>
                                <th>{{ trans('product.ingredients') }}</th>
                                <th>{{ trans('product.suggested_use') }} RU</th><th>{{ trans('product.suggested_use') }} EN</th>
                                <th>{{ trans('product.price') }}</th><th>{{ trans('product.expiration_date') }}</th>
                                <th>{{ trans('product.quantity') }}</th>
                                <th>{{ trans('product.image') }}1</th><th>{{ trans('product.image') }}2</th>
                                <th>{{ trans('product.manufacturer') }}</th><th>{{ trans('product.category') }}</th>
                                <th width="5%"></th><th width="5%"></th></tr>
                            @foreach($products as $n)
                                {{--@if($m->id!=Auth::user()->id)--}}
                                <tr id='TR{{$n->id}}'>
                                    <td>{{$n->id}}</td>
                                    <td id="TR{{$n->id}}TD1">{{$n->name_ru}}</td>
                                    <td id="TR{{$n->id}}TD2">{{$n->name_en}}</td>
                                    <td id="TR{{$n->id}}TD3">{{$n->description_ru}}</td>
                                    <td id="TR{{$n->id}}TD4">{{$n->description_en}}</td>
                                    <td id="TR{{$n->id}}TD5">{{$n->ingredients}}</td>
                                    <td id="TR{{$n->id}}TD6">{{$n->suggested_use_ru}}</td>
                                    <td id="TR{{$n->id}}TD7">{{$n->suggested_use_en}}</td>
                                    <td id="TR{{$n->id}}TD8">{{$n->price}}</td>
                                    <td id="TR{{$n->id}}TD9">{{$n->expiration_date}}</td>
                                    <td id="TR{{$n->id}}TD10">{{$n->quantity}}</td>
                                    <td><img height=40px src="{{asset('/img/news/'.$n->image1)}}"></td>
                                    <td><img height=40px src="{{asset('/img/news/'.$n->image2)}}"></td>
                                    <td>{{$n->manufName}}</td>
                                    <?php $categ="categName"."_".$lang;?>
                                    <td>{{$n->$categ}}</td>
                                    <td><button id='{{$n->id}}' onclick='deleteProduct({{$n->id}})'><i class="fas fa-trash-alt"></i></button></td>
                                    <td><button data-toggle="modal" data-target="#edit" onclick='editProducts({{$n->id}})'><i class="fas fa-edit"></i></button></td>
                                </tr>
                                {{--   @endif--}}
                            @endforeach
                        </table>
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addArticle" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addArticleLabel">{{ trans('admin.add_product') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_ru">{{ trans('product.name') }} RU</label>
                        <input type="text" class="form-control" id="name_ru">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_en">{{ trans('product.name') }} EN</label>
                        <input type="text" class="form-control" id="name_en">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description_ru">{{ trans('product.description') }} RU</label>
                        <textarea type="text" class="form-control" id="description_ru"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description_en">{{ trans('product.description') }} EN</label>
                        <textarea type="text" class="form-control" id="description_en"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ingredients">{{ trans('product.ingredients') }}</label>
                        <textarea type="text" class="form-control" id="ingredients"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="suggested_use_ru">{{ trans('product.suggested_use') }} RU</label>
                        <textarea type="text" class="form-control" id="suggested_use_ru"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="suggested_use_en">{{ trans('product.suggested_use') }} EN</label>
                        <textarea type="text" class="form-control" id="suggested_use_en"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="price">{{ trans('product.price') }}</label>
                        <input type="text" class="form-control" id="price">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="expiration_date">{{ trans('product.expiration_date') }}</label>
                        <input type="text" class="form-control" id="expiration_date">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="quantity">{{ trans('product.quantity') }}</label>
                        <input type="text" class="form-control" id="quantity">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">{{ trans('product.image') }}1</label>
                        <input type="file" class="form-control" id="image1">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">{{ trans('product.image') }}2</label>
                        <input type="file" class="form-control" id="image2">
                    </div>
                </div>
                <div class="modal-body">
                    <label for="manufacturer">{{ trans('product.manufacturer') }}</label>
                    <select class="browser-default custom-select" id="manufacturer">
                        @foreach($manuf as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-body">
                    <label for="categories">{{ trans('product.category') }}</label>
                            <select class="browser-default custom-select" id="categories">
                                @if($lang=='ru')
                                    @foreach($category_ru as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                @endif
                                @if($lang=='en')
                                    @foreach($category_en as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                @endif
                            </select>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-deep-orange" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    <button id="save" type="button" class="btn btn-pink">{{ trans('admin.save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal2 -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addArticleLabel">{{ trans('product.edit') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_edit">ID</label>
                        <input type="text" class="form-control" id="id_edit" readonly>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_ru_edit">{{ trans('product.name') }} RU</label>
                        <input type="text" class="form-control" id="name_ru_edit">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_en_edit">{{ trans('product.name') }} EN</label>
                        <input type="text" class="form-control" id="name_en_edit">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description_ru_edit">{{ trans('product.description') }} RU</label>
                        <textarea type="text" class="form-control" id="description_ru_edit"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description_en_edit">{{ trans('product.description') }} EN</label>
                        <textarea type="text" class="form-control" id="description_en_edit"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ingredients_edit">{{ trans('product.ingredients') }}</label>
                        <textarea type="text" class="form-control" id="ingredients_edit"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="suggested_use_ru_edit">{{ trans('product.suggested_use') }} RU</label>
                        <textarea type="text" class="form-control" id="suggested_use_ru_edit"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="suggested_use_en_edit">{{ trans('product.suggested_use') }} EN</label>
                        <textarea type="text" class="form-control" id="suggested_use_en_edit"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="price_edit">{{ trans('product.price') }}</label>
                        <input type="text" class="form-control" id="price_edit">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="expiration_date_edit">{{ trans('product.expiration_date') }}</label>
                        <input type="text" class="form-control" id="expiration_date_edit">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="quantity_edit">{{ trans('product.quantity') }}</label>
                        <input type="text" class="form-control" id="quantity_edit">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-deep-orange" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    <button id="save_edit" type="button" class="btn btn-pink">{{ trans('admin.save') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection