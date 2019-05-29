@extends('admin.layout.auth')

@section('js')
    <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.orders') }} ID={{$id}}</span>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                            <tr><th>{{ trans('order.product_name') }}</th><th>{{ trans('order.image') }}</th><th>{{ trans('order.quantity') }}</th></tr>
                            </thead>
                            <tbody>
                                {{--@if($m->id!=Auth::user()->id)--}}
                                @foreach($orders as $m)
                                <tr>
                                    <td>{{$m->name}}</td>
                                    <td><img height=40px src="{{$m->image}}"></td>
                                    <td>{{$m->quantity}}</td>
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