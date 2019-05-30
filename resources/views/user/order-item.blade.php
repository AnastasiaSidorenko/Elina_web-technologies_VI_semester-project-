@extends('layouts.app')
@section('title',trans('title.order') )

@section('js')
    <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>
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
    <div class="container" style="width:100vw">
        <div class="row justify-content-center">
            <div class="flex">
                    <div class="card-header">
                        <span>{{ trans('admin.orders') }}</span>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtHorizontalVerticalExample" class="table table-striped table-lg" cellspacing="0" width="100%">
                            <thead>

                    @if($order_status == 1)

                            <tr><th>{{ trans('order.product_name') }}</th><th>{{ trans('order.image') }}</th><th>{{ trans('order.quantity') }}</th><th>{{ trans('order.price') }}</th><th>{{ trans('order.total') }}</th><th></th></tr>
                            </thead>
                            <tbody>

                                    @foreach($order as $m)
                                    <tr>
                                        <td>{{$m->$name}}</td>
                                        <td><img height=50px src="{{$m->image}}"></td>
                                        <td>{{$m->quantity}}</td>
                                        <td>{{$m->price}}</td>
                                        <td>{{$m->quantity*$m->price}}</td>
                                        <td><a style="color:darkorange" href="/user/product/{{$m->id_product}}/review">{{ trans('product.write a review') }}</a></td>
                                    </tr>
                                    @endforeach

                            </tbody>

                        @else

                                <tr><th>{{ trans('order.product_name') }}</th><th>{{ trans('order.image') }}</th><th>{{ trans('order.quantity') }}</th><th>{{ trans('order.price') }}</th><th>{{ trans('order.total') }}</th></tr>
                                </thead>
                                <tbody>
                                @foreach($order as $m)
                                    <tr>
                                        <td>{{$m->$name}}</td>
                                        <td><img height=50px src="{{$m->image}}"></td>
                                        <td>{{$m->quantity}}</td>
                                        <td>{{$m->price}}</td>
                                        <td>{{$m->quantity*$m->price}}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            @endif

                        </table>
                    </div>
                    {{$order->links()}}
                </div>
        </div>
    </div>
@endsection