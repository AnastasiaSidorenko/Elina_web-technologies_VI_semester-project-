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

    <div class="card m-4">
        {{--<div class="container mt-2" style="width:90vw;">--}}
        <div class="rgba-grey-light card-header"><h4>{{ trans('user.cart') }} ({{$quantity}})</h4>
        </div>
        @if($quantity>0)

            <div class="card-body text-center">
                <table  id="dtHorizontalVerticalExample" class="table table-striped table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th width="10%"></th><th width="40%">{{ trans('user.products') }}</th><th>{{ trans('user.price') }}</th><th>{{ trans('user.qty') }}</th><th>{{ trans('user.total') }}</th><th width="5%"></th></tr>
                    </thead>
                    <tbody>@foreach($cart_products as $item)
                        {{--@if($m->id!=Auth::user()->id)--}}
                        <tr id='TR{{$item->id}}'>
                            <td><img height="50px" src="{{$item->image1}}"></td>
                            <td class="text-left">{{$item->$name}}</td>
                            <td id="price{{$item->id}}">{{ $item->price }}</td>
                            <td><button id="minus{{$item->id}}" onclick="Minus({{$item->product_quantity}},{{$item->id}},{{$item->id_product}},{{$item->user_id}})">-</button><span id="countProduct{{$item->id}}">  {{ $item->quantity }} </span><button id="plus{{$item->id}}" onclick="Plus({{$item->product_quantity}},{{$item->id}},{{$item->id_product}},{{$item->user_id}})">+</button></td>
                            <td id="total_sum{{$item->id}}">{{ $item->price*$item->quantity }}</td>
                            <td><button id='BT{{$item->id}}' onclick='deleteItem({{$item->id}},{{$item->id_product}},{{$item->user_id}})'><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                        {{--   @endif--}}
                    @endforeach
                    </tbody>
                </table>

            </div>
            {{$cart_products->links()}}
            <div class="cart__sum text-right mr-5">
            <p>{{ trans('user.total_sum') }} :
                <span id="Total">{{$total_sum}}</span> {{ trans('product.RUB') }}
            </div>
            <button type="button" class="btn btn-purple" data-toggle="modal" data-target="#addCheckout">
                {{ trans('user.checkout') }}
            </button>
            @endif
    </div>
    <!-- Modal 1-->
    <div class="modal fade" id="addCheckout" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addArticleLabel">{{ trans('user.order') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/send_order') }}">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="form-group has-feedback">
                            <label for="city">{{ trans('user.city') }}</label>
                            <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

                            @if ($errors->has('city'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="modal-body{{ $errors->has('street') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="street">{{ trans('user.street') }}</label>
                            <input id="street" type="text" class="form-control" name="street" value="{{ old('street') }}" required>

                            @if ($errors->has('street'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="modal-body{{ $errors->has('house') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="house">{{ trans('user.house') }}</label>
                            <input id="house" type="text" class="form-control" name="house" value="{{ old('house') }}" required>

                            @if ($errors->has('house'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('house') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="modal-body{{ $errors->has('apartment') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="apartment">{{ trans('user.apartment') }} *({{ trans('user.ifExist') }})</label>
                            <input id="apartment" type="text" class="form-control" name="apartment" value="{{ old('apartment') }}">

                            @if ($errors->has('apartment'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('apartment') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="modal-body{{ $errors->has('index') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="index">{{ trans('user.index') }}</label>
                            <input id="index" type="text" class="form-control" name="index" value="{{ old('index') }}" required>

                            @if ($errors->has('index'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('index') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-deep-orange" data-dismiss="modal">{{ trans('admin.close') }}</button>
                        <button id="save" type="submit" class="btn btn-outline-deep-purple">{{ trans('user.toOrder') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
        <script>
            ModalShow();
        </script>
    @elseif(!empty(Session::get('code')) && Session::get('code')==1)
        <script>
            RemoveAll({{Auth::user()->id}});
        </script>
    @endif
@endsection
