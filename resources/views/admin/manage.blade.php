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
                                <th>ID</th><th>{{ trans('admin.name') }}</th><th>{{ trans('admin.email') }}</th><th>{{ trans('admin.role') }}</th><th width="10%"></th></tr>
                            @foreach($managers as $m)
                                {{--@if($m->id!=Auth::user()->id)--}}
                                <tr id='TR{{$m->id}}'>
                                    <td>{{$m->id}}</td>
                                    <td>{{$m->name}}</td>
                                    <td>{{$m->email}}</td>
                                    <td id="TdEdit">
                                        <div id="role" class="edit" data-id="{{$m->id}}" contenteditable>{{$m->role}}</div>
                                    </td>
                                    <td><button id='{{$m->id}}' onclick='deleteManagers({{$m->id}})'><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                                {{--   @endif--}}
                            @endforeach
                        </table>
                    </div>
                    {{$managers->links()}}
                </div>
            </div>
        </div>
    </div>

 @endsection