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
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->email}}</td>
                                    <td id="TdEdit">{{$p->role}}</td>
                                    <td><button id='{{$p->id}}' onclick='deleteManagers({{p->id}})'>{{ trans('admin.delete') }}</button></td>
                                    {{--<td><button id='{{$m->id}}' onclick='editManagers({{$m->id}})'>Редактировать</button></td>
--}}
                                </tr>
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