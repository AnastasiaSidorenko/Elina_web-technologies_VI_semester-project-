<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

{{--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}

<!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.js') }}"></script>
    <!-- Managers -->
    @yield('js')

</head>
<body>
<div class="header">
        <div class="d-flex flex-column top-header-admin">
            <div class="language-switcher d-flex justify-content-start">
                <a class="ml-1" href="/setlocale/ru">RU</a>
                <a class="ml-1" href="/setlocale/en">EN</a>
            </div>
        </div>
                <div class="d-flex account-panel justify-content-center mt-auto mb-2 admin-login">
                    {{--<a class="mr-2" href="{{ url('/user/register') }}">{{ trans('top&middle_menu.register') }}</a>--}}
                    {{--<a class="mr-2" href="{{ url('/user/login') }}">{{ trans('top&middle_menu.login') }}</a>--}}

                    @auth
                        <a class="mr-3" href="#">{{trans('top&middle_menu.you_are')}}{{ Auth::user()->name }}</a>
                        <a href="{{ url('/user/logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ trans('login.logout') }}
                        </a>
                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a class="mr-2" href="{{ url('/admin/register') }}">{{ trans('top&middle_menu.register') }}</a>
                        <a class="mr-2" href="{{ url('/admin/login') }}">{{ trans('top&middle_menu.login') }}</a>
                    @endauth
                </div>
    <div class="header__middle container ml-0 mt-0 mr-0 navbar-expand-lg d-flex">
        <div class="logo navbar-brand mt-0">
            <a href="/admin/home"><img class="logo__img d-inline-flex" src="{{ asset('img/200.png') }}"></a>
            <span class="logo__name navbar-brand font-italic d-inline-flex align-bottom">ELINA</span>
        </div>
    </div>
    <div class="p-1" style="background-color:#F7B878; m-1"></div>
</div>

@yield('content')

</body>
</html>