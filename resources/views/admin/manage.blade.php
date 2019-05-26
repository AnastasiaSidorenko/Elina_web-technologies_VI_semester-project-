@extends('admin.layout.auth')

@section('js')
    <script type="text/javascript" src="{{ asset('js/contentManagers.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.content_managers') }}</span>
                        <button type="button" onclick="location.href='/admin/register'" class="btn btn-amber pull-right" >{{ trans('admin.create') }}</button>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <tr>
                                <th>ID</th><th>{{ trans('admin.name') }}</th><th>{{ trans('admin.email') }}</th><th>{{ trans('admin.role') }}</th><th width="5%"><th width="5%"></th></tr>
                            @foreach($managers as $m)
                                @if($m->id!=Auth::user()->id)
                                <tr id='TR{{$m->id}}'>
                                    <td>{{$m->id}}</td>
                                    <td id="TR{{$m->id}}TD1">{{$m->name}}</td>
                                    <td>{{$m->email}}</td>
                                    <td id="TR{{$m->id}}TD2">{{$m->role}}</td>
                                    <td><button id='{{$m->id}}' onclick='deleteManagers({{$m->id}})'><i class="fas fa-trash-alt"></i></button></td>
                                    <td><button data-toggle="modal" data-target="#edit" onclick='editManagers({{$m->id}})'><i class="fas fa-edit"></i></button></td>
                                </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    {{$managers->links()}}
                </div>
            </div>
        </div>
    </div>

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
                        <label for="name_edit">{{ trans('admin.name') }}</label>
                        <input type="text" class="form-control" id="name_edit">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="role_edit">{{ trans('admin.role') }}</label>
                        <textarea type="text" class="form-control" id="role_edit"></textarea>
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