<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script src="{{ asset('js/mdb.js') }}"></script>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('js')

</head>
 <body>
        <div class="header">
            <div class="header__top">
                <nav class="top-menu top navbar navbar-expand-lg p-0 justify-content-center">
                    <a class="pr-4" href="{{ url('/about_us') }}">{{ trans('top&middle_menu.about_us') }}</a>
                    <a class="pr-4" href="{{ url('/news') }}">{{ trans('top&middle_menu.news') }}</a>
                    <a class="pr-4" href="{{ url('/how_to_find_us') }}">{{ trans('top&middle_menu.how_to_find_us') }}</a>
                </nav>
            </div>

            <div class="header__middle container ml-0 mt-0 mr-0 navbar-expand-lg d-flex">
                <div class="logo navbar-brand mt-0">
                    <a href="/"><img class="logo__img d-inline-flex" src="{{ asset('img/200.png') }}"></a>
                    <span class="logo__name navbar-brand font-italic d-inline-flex align-bottom">ELINA</span>
                </div>

                <div class="d-flex ml-auto flex-column">
                    <div class="language-switcher d-flex justify-content-end">
                        <a class="ml-1" href="/setlocale/ru">RU</a>
                        <a class="ml-1" href="/setlocale/en">EN</a>
                    </div>
                    {{--<div class="search-panel ml-auto form-inline mt-auto">--}}
                        {{--<input class="form-control" type="search" placeholder="Search" aria-label="Search">--}}
                        {{--<i class="fas fa-search pl-1 pr-2"></i>--}}
                    {{--</div>--}}
                    <div class="account-panel ml-auto mt-auto mb-2">
                    @auth
                        <a href="#">{{ Auth::user()->fio }}</a>
                        <a href="{{ url('/user/logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ trans('login.logout') }}
                        </a>
                        <form id="logout-form" action="{{ url('/user/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                            <a class="mr-2" href="{{ url('/user/register') }}">{{ trans('top&middle_menu.register') }}</a>
                            <a class="mr-2" href="{{ url('/user/login') }}">{{ trans('top&middle_menu.login') }}</a>
                    @endauth

                        @auth
                            <a class="mr-2" href="/user/account/{{Auth::user()->id}}">{{ trans('top&middle_menu.my_account') }}</a>
                            <a href="/user/cart/{{Auth::user()->id}}"><i class="fas fa-shopping-cart mr-2"></i></a>
                        @else
                            <a href="/user/login"><i class="fas fa-shopping-cart mr-2"></i></a>
                        @endauth

                    </div>
                </div>
            </div>
        </div>

        <nav class="main-menu d-flex justify-content-around align-items-center">
            {{--Face--}}
            <div class="main-menu__toggler">
                     <a data-toggle="dropdown"
               aria-expanded="false">{{ trans('face.face') }}</a>
                    <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                        <div class="d-flex">
                        <div class="dropdown-col col align-self-start">
                            <a class="dropdown-item" href="/products/1">{{ trans('main-menu_subc.all') }}</a>
                            <a class="dropdown-item" href="/products/1/new">{{ trans('main-menu_subc.new') }}</a>
                            {{--<a class="dropdown-item" href="/products/1/sale">{{ trans('main-menu_subc.sale') }}</a>
                            <a class="dropdown-item" href="/products/2/kits">{{ trans('main-menu_subc.kits') }}</a>
                        --}}</div>
                        <div class="dropdown-col col align-content-start">
                            <a class="dropdown-item" href="/products/category/10">{{ trans('face.wash') }}</a>
                            <a class="dropdown-item" href="/products/category/11">{{ trans('face.toners') }}</a>
                            <a class="dropdown-item" href="/products/category/12">{{ trans('face.peels') }}</a>
                        </div>
                        <div class="dropdown-col col align-content-start">
                            <a class="dropdown-item" href="/products/category/13">{{ trans('face.face_oils') }}</a>
                            <a class="dropdown-item" href="/products/category/14">{{ trans('face.masks') }}</a>
                            <a class="dropdown-item" href="/products/category/15">{{ trans('face.sun_care') }}</a>
                            <a class="dropdown-item" href="/products/category/16">{{ trans('face.lip_balms') }}</a>
                        </div>
                        </div>
                     </div>
            </div>
            <div class="main-menu__toggler">
                <a data-toggle="dropdown"
                   aria-expanded="false">{{ trans('hair.hair') }}</a>
                <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                    <div class="d-flex">
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/2">{{ trans('main-menu_subc.all') }}</a>
                        <a class="dropdown-item" href="/products/2/new">{{ trans('main-menu_subc.new') }}</a>
                        {{--<a class="dropdown-item" href="/products/2/sale">{{ trans('main-menu_subc.sale') }}</a>
                        <a class="dropdown-item" href="/products/2/kits">{{ trans('main-menu_subc.kits') }}</a>
                    --}}</div>
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/category/20">{{ trans('hair.shampoo') }}</a>
                        <a class="dropdown-item" href="/products/category/21">{{ trans('hair.conditioner') }}</a>
                        <a class="dropdown-item" href="/products/category/22">{{ trans('hair.mask') }}</a>
                        <a class="dropdown-item" href="/products/category/23">{{ trans('hair.scrub') }}</a>
                    </div>
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/category/24">{{ trans('hair.serum') }}</a>
                        <a class="dropdown-item" href="/products/category/25">{{ trans('hair.gel') }}</a>
                        <a class="dropdown-item" href="/products/category/26">{{ trans('hair.cream') }}</a>
                        <a class="dropdown-item" href="/products/category/27">{{ trans('hair.oil') }}</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="main-menu__toggler">
                <a class="p-1" data-toggle="dropdown"
                   aria-expanded="false" aria-haspopup="true">{{ trans('body.body') }}</a>
                <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                    <div class="d-flex">
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/3">{{ trans('main-menu_subc.all') }}</a>
                        <a class="dropdown-item" href="/products/3/new">{{ trans('main-menu_subc.new') }}</a>
                        {{--<a class="dropdown-item" href="/products/3/sale">{{ trans('main-menu_subc.sale') }}</a>
                        <a class="dropdown-item" href="/products/3/kits">{{ trans('main-menu_subc.kits') }}</a>
                   --}} </div>
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/category/30">{{ trans('body.wash') }}</a>
                        <a class="dropdown-item" href="/products/category/31">{{ trans('body.lotions_oils') }}</a>
                        <a class="dropdown-item" href="/products/category/32">{{ trans('body.hand_wash') }}</a>
                        <a class="dropdown-item" href="/products/category/33">{{ trans('body.hand') }}</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="main-menu__toggler">
                <a data-toggle="dropdown"
                   aria-expanded="false">{{ trans('oils&aromatherapy.oils&aromatherapy') }}</a>
                <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                    <div class="d-flex">
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/4">{{ trans('main-menu_subc.all') }}</a>
                        <a class="dropdown-item" href="/products/4/new">{{ trans('main-menu_subc.new') }}</a>
                       {{-- <a class="dropdown-item" href="/products/4/sale">{{ trans('main-menu_subc.sale') }}</a>
                        <a class="dropdown-item" href="/products/4/kits">{{ trans('main-menu_subc.kits') }}</a>
                    --}}</div>
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/category/40">{{ trans('oils&aromatherapy.oils') }}</a>
                        <a class="dropdown-item" href="/products/category/41">{{ trans('oils&aromatherapy.essential_oils') }}</a>
                        <a class="dropdown-item" href="/products/category/42">{{ trans('oils&aromatherapy.butters') }}</a>
                        <a class="dropdown-item" href="/products/category/43">{{ trans('oils&aromatherapy.mists') }}</a>
                    </div>
                </div>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="page-footer font-small text-black-50" style="width:100vw;">
            <!-- Footer Links -->
            <div class="container text-center text-md-left mt-5 py-1">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase font-weight-bold">Elina</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                        <p style="color: white;">{{trans('top&middle_menu.shop')}}</p>
                    </div>

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-3 col-xl-2 mx-auto mb-3">
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold"><nobr>{{ trans('footer.useful_links') }}</nobr></h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><a href="{{ url('/news') }}">{{ trans('top&middle_menu.news') }}</a></p>
                        <p><a href="#!">{{ trans('footer.your_account') }}</a></p>
                        <p><a href="https://cosmeticsinfo.org/whats-my-products">{{ trans('footer.ingredients_database') }}</a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">{{ trans('footer.contact') }}</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><a href="{{ url('/how_to_find_us') }}">{{ trans('top&middle_menu.how_to_find_us') }}</a></p>

                        <p style="color: white;"><i class="fas fa-home mr-3"></i>{{trans('find_us.city')}}</p>
                        <p style="color: white;"><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                        <p style="color: white;"><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>

                        {{--<p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>--}}
                    </div>
                    <!-- Grid column -->
                <!-- Grid row -->
            </div>
            <!-- Footer Links -->
            <!-- Copyright -->
             <div class="text-center py-1" style="color: white;">© 2019 Copyright: Sidorenko
             </div>
            <!-- Copyright -->
            </div>
        </footer>
        <!-- Footer -->

    </body>
</html>
