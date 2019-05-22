@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">{{ trans('login.auth') }}</div>

                <div class="card-body">
                    {{ trans('login.you_are_logged_in') }}{{Auth::user()->fio}}!
                </div>
            </div>
    </div>
</div>
@endsection
