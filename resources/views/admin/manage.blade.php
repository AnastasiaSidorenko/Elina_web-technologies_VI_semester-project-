@extends('admin.layout.auth')

<<<<<<< HEAD
{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ trans('login.auth') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--Managing managers!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}

@extends('admin.layouts.app')
=======
@section('js')
    <script type="text/javascript" src="{{ asset('js/contentManagers.js') }}"></script>
@endsection
>>>>>>> 7ab006a18cd229452bd657e1f18ee0e7ea01321b

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ trans('admin.content_managers') }}</div>
                    <div class="card-body text-center">
                        <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <tr>
                                <th>ID</th><th>{{ trans('admin.name') }}</th><th>{{ trans('admin.email') }}</th><th>{{ trans('admin.role') }}</th><th>
                                @foreach($managers as $m)
                                        {{--@if($m->id!=Auth::user()->id)--}}
                                        <tr id='TR{{$m->id}}'>
                                            <td>{{$m->id}}</td>
                                            <td>{{$m->name}}</td>
                                            <td>{{$m->email}}</td>
                                            <td>{{$m->role}}</td>
                                            <td><button id='{{$m->id}}' onclick='deleteManagers({{$m->id}})'>Удалить</button>
                                                <button id='{{$m->id}}' onclick='editManagers({{$m->id}})'>Редактировать</button>
                                            </td>
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