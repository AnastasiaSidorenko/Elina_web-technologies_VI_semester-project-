@extends('admin.layout.auth')
@section('title',trans('title.order') )

@section('js')
    <script src="{{ asset('js/addons/datatables.min.js') }}"></script>
@endsection

@section('content')
    <?php
    if(App::getLocale()=='en'){
        $name = 'name_en';
    }
    else{
        $name = 'name_ru';
    }
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.orders') }} ID={{$id}}</span>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                            <tr><th>{{ trans('order.product_name') }}</th><th>{{ trans('order.image') }}</th><th>{{ trans('order.quantity') }}</th><th>{{ trans('order.price') }}</th><th>{{ trans('order.total') }}</th></tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $m)
                                <tr>
                                    <td>{{$m->$name}}</td>
                                    <td><img height=50px src="{{$m->image}}"></td>
                                    <td>{{$m->quantity}}</td>
                                    <td>{{$m->price}}</td>
                                    <td>{{$m->quantity*$m->price}}</td>
                                     </tr>
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