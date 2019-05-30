@extends('layouts.app')
@section('title',trans('title.orders') )
@section('js')
    {{--<script type="text/javascript" src="{{ asset('js/order.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('order.orders') }}</span>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtHorizontalVerticalExample" class="table table-striped table-sm" cellspacing="0" width="100%">
                            <thead>  <tr>
                                <th>ID</th><th>{{ trans('order.date') }}</th><th>{{ trans('order.total_price') }}</th><th>{{ trans('order.address') }}</th><th>{{ trans('order.status') }}</th><th width="5%"></th></tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $m)
                                {{--@if($m->id!=Auth::user()->id)--}}
                                <tr id='TR{{$m->id}}'>
                                    <td><a href="/{{$m->id}}" target="_blank">{{$m->id}}</a></td>
                                    <td>{{$m->date}}</td>
                                    <td>{{$m->total_price}}</td>
                                    <td>{{$m->address}}</td>
                                    <td id="TR{{$m->id}}TD1">{{$m->status}}</td>
                                    <td><button id='{{$m->id}}' onclick='deleteOrder({{$m->id}})'><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                                {{--   @endif--}}
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection