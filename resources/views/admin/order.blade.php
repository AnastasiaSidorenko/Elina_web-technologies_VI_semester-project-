@extends('admin.layout.auth')

@section('js')
    <script type="text/javascript" src="{{ asset('js/order.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.orders') }}</span>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <tr>
                                <th>ID</th><th>{{ trans('admin.date') }}</th><th>{{ trans('admin.total_price') }}</th><th>{{ trans('admin.address') }}</th><th>{{ trans('admin.user') }}</th><th>{{ trans('admin.status') }}</th><th width="10%"></th></tr>
                            @foreach($orders as $m)
                                {{--@if($m->id!=Auth::user()->id)--}}
                                <tr id='TR{{$m->id}}'>
                                    <td>{{$m->id}}</td>
                                    <td>{{$m->date}}</td>
                                    <td>{{$m->total_price}}</td>
                                    <td>{{$m->address}}</td>
                                    <td>{{$m->user}}</td>
                                    <td id="TdEdit">
                                        <div id="status" class="edit" data-id="{{$m->id}}" contenteditable>{{$m->status}}</div>
                                    </td>
                                    <td><button id='{{$m->id}}' onclick='deleteOrder({{$m->id}})'><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                                {{--   @endif--}}
                            @endforeach
                        </table>
                    </div>
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection