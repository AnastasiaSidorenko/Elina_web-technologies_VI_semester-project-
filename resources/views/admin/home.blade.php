@extends('admin.layout.auth')

@section('content')
    {{--<div class="d-flex justify-content-center">
        <ul class="list-group account-panel d-inline">
            <li class="list-group-item list-group-item-warning"><a href="managers">{{ trans('admin.content_managers') }}</a></li>
            <li class="list-group-item list-group-item-warning"><a href="managers">{{ trans('admin.products') }}</a></li>
            --}}{{--<li class="list-group-item">Dapibus ac facilisis in</li>--}}{{--
            --}}{{--<li class="list-group-item list-group-item-primary">A simple primary list group item</li>--}}{{--
            --}}{{--<li class="list-group-item list-group-item-secondary">A simple secondary list group item</li>--}}{{--
            --}}{{--<li class="list-group-item list-group-item-success">A simple success list group item</li>--}}{{--
            --}}{{--<li class="list-group-item list-group-item-danger">A simple danger list group item</li>--}}{{--
            --}}{{--<li class="list-group-item list-group-item-warning">A simple warning list group item</li>--}}{{--
            --}}{{--<li class="list-group-item list-group-item-info">A simple info list group item</li>--}}{{--
            --}}{{--<li class="list-group-item list-group-item-light">A simple light list group item</li>--}}{{--
            --}}{{--<li class="list-group-item list-group-item-dark">A simple dark list group item</li>--}}{{--
        </ul>
    </div>--}}
    <div class="main-menu__toggler admin__menu d-flex justify-content-around align-items-center">
        <a href="managers">{{ trans('admin.content_managers') }}</a>
        <a href="products">{{ trans('admin.products') }}</a>
        <a href="news">{{ trans('admin.news') }}</a>
        <a href="orders">{{ trans('admin.orders') }}</a>
        <a href="manufacturers">{{ trans('admin.manufacturers') }}</a>
    </div>
@endsection
