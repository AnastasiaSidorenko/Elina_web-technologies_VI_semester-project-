<?php
@extends('admin.layout.auth')

@section('js')
    <script type="text/javascript" src="{{ asset('js/addProduct.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span>{{ trans('admin.products') }}</span>
                        <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addArticle">
                            {{ trans('admin.create') }}
                        </button>
                        <button id="AddProductForm" class="btn btn-default btn-rounded btn-outline-deep-purple mb-4" onclick='AddProductForm'>{{ trans('admin.create') }}</button>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <tr>
                                <th>ID</th><th>{{ trans('admin.name') }}</th><th>{{ trans('admin.email') }}</th><th>{{ trans('admin.role') }}</th><th width="10%"></th></tr>
                            @foreach($products as $p)
                                {{--@if($m->id!=Auth::user()->id)--}}
                                <tr id='TR{{$p->id}}'>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->name_en}}</td>
                                    <td>{{$p->name_ru}}</td>
                                    <td>{{$p->price}}</td>
                                    <td>{{$p->expiration_date}}</td>
                                    <td>{{$p->quantity}}</td>

                                    <td id="TdEdit">{{$p->role}}</td>
                                    <td><button id='{{$p->id}}' onclick='deleteManagers({{p->id}})'>{{ trans('admin.delete') }}</button></td>
                                    {{--<td><button id='{{$m->id}}' onclick='editManagers({{$m->id}})'>Редактировать</button></td>
--}}
                                </tr>
                                'id',
                                'name_en',
                                'name_ru',
                                'description_en',
                                'description_ru',
                                'suggested_use_en',
                                'suggested_use_ru',
                                'ingredients',
                                'price',
                                'expiration_date',
                                'quantity',
                                'id_manufacturer',
                                'id_category',
                                {{--   @endif--}}
                            @endforeach
                        </table>
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection