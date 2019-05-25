@extends('admin.layout.auth')

@section('js')
    <script type="text/javascript" src="{{ asset('js/Products.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.products') }}</span>
                        <button type="button" class="btn btn-amber pull-right" data-toggle="modal" data-target="#addArticle">
                            {{ trans('admin.create') }}
                        </button>
                    </div>
                    <div class="card-body text-center">
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
                                <th width="10%"></th></tr>
                            @foreach($products as $n)
                                {{--@if($m->id!=Auth::user()->id)--}}
                                <tr id='TR{{$n->id}}'>
                                    <td>{{$n->id}}</td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->name_ru}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->name_en}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->description_ru}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->description_en}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->ingredients}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->suggested_use_ru}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->suggested_use_en}}</div>
                                    </td>
                                    <td>{{$n->price}}</td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->expiration_date}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->quantity}}</div>
                                    </td>
                                    <td>{{$n->image1}}</td>
                                    <td>{{$n->image2}}</td>
                                    <td>{{$n->categName}}</td>
                                    <td>{{$n->manufName}}</td>
                                    <td><button id='{{$n->id}}' onclick='deleteProduct({{$n->id}})'><i class="fas fa-trash-alt"></i></button></td>
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
                        <textarea type="text" class="form-control" id="price"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="expiration_date">{{ trans('product.expiration_date') }}</label>
                        <textarea type="text" class="form-control" id="expiration_date"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="quantity">{{ trans('product.quantity') }}</label>
                        <textarea type="text" class="form-control" id="quantity"></textarea>
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

                <th>{{ trans('product.manufacturer') }}</th><th>{{ trans('product.category') }}</th>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Image</label>
                        <input type="file" class="form-control" id="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-deep-orange" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    <button id="save" type="button" class="btn btn-pink">{{ trans('admin.save') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection