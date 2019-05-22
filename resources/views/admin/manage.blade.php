{{--@extends('admin.layout.auth')--}}

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

@extends('layouts.app')

@section('content')
    <div class="container">
        <!--    <div class="row justify-content-left"> -->
        <div class="col-md-15">
            <div class="card text-center">
                <div class="card-body">
                    <div class="table">
                        <table border>
                            <tr>
                                <th>{{ trans('admin.name') }}</th><th>{{ trans('admin.email') }}</th><th>{{ trans('admin.role') }}</th>
                            </tr> <!--ряд с ячейками заголовков-->
                            @foreach ($managers as $manager)
                                <tr>
                                    <td>{{ $manager->name}}</td>
                                    <td>{{ $manager->email }}</td>
                                    <td>{{ $manager->role }}</td>
                                </tr> <!--ряд с ячейками тела таблицы-->
                            @endforeach
                        </table>
                    </div>
                    {{ $managers->links() }}
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
@endsection