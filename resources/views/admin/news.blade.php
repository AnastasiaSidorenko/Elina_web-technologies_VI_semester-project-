@extends('admin.layout.auth')

@section('js')
    <script src="{{ asset('js/News.js') }}"></script>

    <script src="{{ asset('js/addons/datatables.min.js') }}"></script>

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.news') }}</span>
                        <button type="button" class="btn btn-amber pull-right" data-toggle="modal" data-target="#addArticle">
                            {{ trans('admin.create') }}
                        </button>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>  <tr>
                                <th>ID</th><th>{{ trans('news.title') }} RU</th><th>{{ trans('news.title') }} EN</th><th>{{ trans('news.body') }} RU</th><th>{{ trans('news.body') }} EN</th><th>{{ trans('news.date') }}</th><th>{{ trans('news.image') }}</th><th width="5%"><th width="5%"></tr>
                            </thead>
                            <tbody>@foreach($news as $n)
                                {{--@if($m->id!=Auth::user()->id)--}}
                                <tr id='TR{{$n->id}}'>
                                    <td>{{$n->id}}</td>
                                    <td id="TR{{$n->id}}TD1">{{$n->title_ru}}</td>
                                    <td id="TR{{$n->id}}TD2">{{$n->title_en}}</td>
                                    <td id="TR{{$n->id}}TD3">{{$n->body_ru}}</td>
                                    <td id="TR{{$n->id}}TD4">{{$n->body_en}}</td>
                                    <td>{{$n->date}}</td>
                                    <td><img height=40px src="{{asset('/img/news/'.$n->image)}}"></td>
                                    <td><button id='{{$n->id}}' onclick='deleteNews({{$n->id}})'><i class="fas fa-trash-alt"></i></button></td>
                                    <td><button data-toggle="modal" data-target="#edit" onclick='editNews({{$n->id}})'><i class="fas fa-edit"></i></button></td>
                                </tr>
                                {{--   @endif--}}
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$news->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 1-->
    <div class="modal fade" id="addArticle" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addArticleLabel">{{ trans('admin.adding_news') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title_ru">{{ trans('news.title') }} RU</label>
                        <input type="text" class="form-control" id="title_ru">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title_en">{{ trans('news.title') }} EN</label>
                        <input type="text" class="form-control" id="title_en">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="body_ru">{{ trans('news.body') }} RU</label>
                        <textarea type="text" class="form-control" id="body_ru"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="body_en">{{ trans('news.body') }} EN</label>
                        <textarea type="text" class="form-control" id="body_en"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">{{ trans('news.image') }}</label>
                        <input type="file" class="form-control" id="image">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-deep-orange" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    <button id="save" type="button" class="btn btn-pink">{{ trans('admin.save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editLabel">{{ trans('news.edit') }}</h4>
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
                        <label for="title_ru_edit">{{ trans('news.title') }} RU</label>
                        <input type="text" class="form-control" id="title_ru_edit">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title_en_edit">{{ trans('news.title') }} EN</label>
                        <input type="text" class="form-control" id="title_en_edit">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="body_ru_edit">{{ trans('news.body') }} RU</label>
                        <textarea type="text" class="form-control" id="body_ru_edit"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="body_en_edit">{{ trans('news.body') }} EN</label>
                        <textarea type="text" class="form-control" id="body_en_edit"></textarea>
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