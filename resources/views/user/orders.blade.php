@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{ asset('js/Cart.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>

@endsection
@section('content')

    <?php

    if(App::getLocale()=='en'){
        $name='name_en';
    }
    else{
        $name='name_ru';
    }
    $manuf_name='manufacturers.name';
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.orders') }}</span>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>  <tr>
                                <th></th><th>{{ trans('admin.date') }}</th><th>{{ trans('admin.total_price') }}</th><th>{{ trans('admin.address') }}</th><th>{{ trans('admin.user') }}</th><th>{{ trans('admin.status') }}</th></tr>
                            </thead>
                            <tbody>@foreach($orders as $m)
                                @if($m->status==2)
                                    <tr style="background:lightslategrey;">
                                        <td><button type="submit" target="_blank" onclick="window.open('/user/account/{{Auth::user()->id}}/orders/{{$m->id}}')" class="btn deep-purple btn-sm">{{ trans('admin.more') }}</button></td>
                                        <td>{{$m->date}}</td>
                                        <td>{{$m->total_price}}</td>
                                        <td>{{$m->address}}</td>
                                        <td>{{$m->userFIO}}</td>
                                        <td>отклонен</td>
                                        </tr>
                                @else
                                    <tr>
                                        <td><button type="submit" target="_blank" onclick="window.open('/user/account/{{Auth::user()->id}}/orders/{{$m->id}}')" class="btn deep-purple btn-sm">{{ trans('admin.more') }}</button></td>
                                        <td>{{$m->date}}</td>
                                        <td>{{$m->total_price}}</td>
                                        <td>{{$m->address}}</td>
                                        <td>{{$m->userFIO}}</td>
                                        @if($m->status==0)
                                            <td>готов к обработке</td>
                                        @elseif($m->status==1)
                                            <td>выполнен</td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
