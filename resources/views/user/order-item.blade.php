@extends('admin.layout.auth')
@section('title',trans('title.order') )
@section('js')
    <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>
@endsection

@section('content')
    <?php
        session_start();
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
                        <span>{{ trans('order.orders') }} ID={{$id}}</span>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                            <tr><th>{{ trans('order.product_name') }}</th><th>{{ trans('order.image') }}</th><th>{{ trans('order.quantity') }}</th></tr>
                            </thead>
                            <tbody>
                            @foreach($order as $product)
                                <tr>
                                    <td>{{$product->manuf_name}},{{$m->name}}</td>
                                    <td><img height=40px src="{{$m->image}}"></td>
                                    <td>{{$m->quantity}}</td>
                                    <td>{{$m->quantity}}*{{$m->order_product_price}}</td>
                                </tr>
                            @endforeach
                            <p class="text-right">{{ trans('order.total_price') }} {{$m->total_price}}</p>
                            </tbody>
                        </table>
                    </div>
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection