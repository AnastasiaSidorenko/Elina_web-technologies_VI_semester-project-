@extends('admin.layout.auth')

@section('js')
    <script type="text/javascript" src="{{ asset('js/order.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>
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
                        <table  id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>  <tr>
                                <th>ID</th><th>{{ trans('admin.date') }}</th><th>{{ trans('admin.total_price') }}</th><th>{{ trans('admin.address') }}</th><th>{{ trans('admin.user') }}</th><th>{{ trans('admin.status') }}</th><th width="5%"></th></tr>
                            </thead>
                            <tbody>@foreach($orders as $m)
                                {{--@if($m->id!=Auth::user()->id)--}}
                                @if($m->status==2)
                                    <tr id='TR{{$m->id}}' style="background:grey;">
                                        <td><a href="/admin/orders/{{$m->id}}" target="_blank">{{$m->id}}</a></td>
                                        <td>{{$m->date}}</td>
                                        <td>{{$m->total_price}}</td>
                                        <td>{{$m->address}}</td>
                                        <td>{{$m->userFIO}}</td>
                                        <td id="TR{{$m->id}}TD1">{{$m->status}}</td>
                                        <td><button id='{{$m->id}}' onclick='deleteOrder({{$m->id}})'><i class="fas fa-trash-alt"></i></button></td>
                                    </tr>
                                @else
                                    <tr id='TR{{$m->id}}'>
                                        <td><a href="/admin/orders/{{$m->id}}" target="_blank">{{$m->id}}</a></td>
                                        <td>{{$m->date}}</td>
                                        <td>{{$m->total_price}}</td>
                                        <td>{{$m->address}}</td>
                                        <td>{{$m->userFIO}}</td>
                                        <td id="TR{{$m->id}}TD1">{{$m->status}}</td>
                                        <td><button data-toggle="modal" data-target="#edit" onclick='editOrder({{$m->id}})'><i class="fas fa-edit"></i></button></td>
                                    </tr>
                                @endif
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
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editLabel">{{ trans('news.edit') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_edit">ID</label>
                        <input type="text" class="form-control" id="id_edit" readonly>
                    </div>
                </div>
                <div class="modal-body">
                    <label for="status_edit">{{ trans('admin.status') }}</label>
                    <select class="browser-default custom-select" id="status_edit">
                        <option value="0">готов к обработке</option>
                        <option value="1">доставлен</option>
                        <option value="2">отклонен</option>
                    </select>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-deep-orange" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    <button id="save_edit" type="button" class="btn btn-pink">{{ trans('admin.save') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection