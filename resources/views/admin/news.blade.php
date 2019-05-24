@extends('admin.layout.auth')

@section('js')
    <script type="text/javascript" src="{{ asset('js/News.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.news') }}</span>
                        <button type="button" class="btn btn-amber pull-right" data-toggle="modal" data-target="#addArticle">
                            {{ trans('admin.create') }}
                        </button>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <tr>
                                <th>ID</th><th>Title_ru</th><th>Title_en</th><th>Body_ru</th><th>Body_en</th><th>Date</th><th>Image</th><th width="10%"></th></tr>
                            @foreach($news as $n)
                                {{--@if($m->id!=Auth::user()->id)--}}
                                <tr id='TR{{$n->id}}'>
                                    <td>{{$n->id}}</td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->title_ru}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->title_en}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->body_ru}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->body_en}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->date}}</div>
                                    </td>
                                    <td id="TdEdit">
                                        <div class="edit" data-id="{{$n->id}}" contenteditable>{{$n->image}}</div>
                                    </td>
                                    <td><button id='{{$n->id}}' onclick='deleteNews({{$n->id}})'><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                                {{--   @endif--}}
                            @endforeach
                        </table>
                    </div>
                    {{$news->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addArticle" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addArticleLabel">{{ trans('admin.adding_news') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title_ru">Title_ru</label>
                        <input type="text" class="form-control" id="title_ru">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title_en">Title_en</label>
                        <input type="text" class="form-control" id="title_en">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="body_ru">Body_ru</label>
                        <textarea type="text" class="form-control" id="body_ru"></textarea>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="body_en">Body_en</label>
                        <textarea type="text" class="form-control" id="body_en"></textarea>
                    </div>
                </div>
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