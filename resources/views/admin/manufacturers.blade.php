@extends('admin.layout.auth')

@section('js')
    <script type="text/javascript" src="{{ asset('js/Manufacturers.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.manufacturers') }}</span>
                        <button type="button" class="btn btn-amber pull-right" data-toggle="modal" data-target="#addArticle">
                            {{ trans('admin.create') }}
                        </button>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <tr>
                                <th>ID</th><th>{{ trans('admin.name') }}</th><th width="5%"><th width="5%"></th></tr>
                            @foreach($manufacturers as $m)
                                {{--@if($m->id!=Auth::user()->id)--}}
                                <tr id='TR{{$m->id}}'>
                                    <td>{{$m->id}}</td>
                                    <td id="TR{{$m->id}}TD1">{{$m->name}}</td>
                                    <td><button id='{{$m->id}}' onclick='deleteManuf({{$m->id}})'><i class="fas fa-trash-alt"></i></button></td>
                                    <td><button data-toggle="modal" data-target="#edit" onclick='editManuf({{$m->id}})'><i class="fas fa-edit"></i></button></td>
                                </tr>
                                {{--   @endif--}}
                            @endforeach
                        </table>
                    </div>
                    {{$manufacturers->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addArticle" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addArticleLabel">{{ trans('admin.adding_manufacturer') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ trans('admin.name') }}</label>
                        <input type="text" class="form-control" id="name">
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
                    <h4 class="modal-title" id="editLabel">{{ trans('admin.adding_news') }}</h4>
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
                        <label for="name_edit">{{ trans('admin.name') }}</label>
                        <input type="text" class="form-control" id="name_edit">
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