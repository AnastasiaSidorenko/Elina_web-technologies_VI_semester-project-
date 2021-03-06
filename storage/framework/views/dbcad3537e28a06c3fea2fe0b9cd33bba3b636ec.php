<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">



    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <script type="text/javascript" src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('js/mdb.js')); ?>"></script>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <?php echo $__env->yieldContent('js'); ?>

</head>
 <body>
        <div class="header">
            <div class="header__top">
                <nav class="top-menu top navbar navbar-expand-lg p-0 justify-content-center">
                    <a class="pr-4" href="<?php echo e(url('/about_us')); ?>"><?php echo e(trans('top&middle_menu.about_us')); ?></a>
                    <a class="pr-4" href="<?php echo e(url('/news')); ?>"><?php echo e(trans('top&middle_menu.news')); ?></a>
                    <a class="pr-4" href="<?php echo e(url('/how_to_find_us')); ?>"t><?php echo e(trans('top&middle_menu.how_to_find_us')); ?></a>
                </nav>
            </div>

            <div class="header__middle container ml-0 mt-0 mr-0 navbar-expand-lg d-flex">
                <div class="logo navbar-brand mt-0">
                    <a href="/"><img class="logo__img d-inline-flex" src="<?php echo e(asset('img/200.png')); ?>"></a>
                    <span class="logo__name navbar-brand font-italic d-inline-flex align-bottom">ELINA</span>
                </div>

                <div class="d-flex ml-auto flex-column">
                    <div class="language-switcher d-flex justify-content-end">
                        <a class="ml-1" href="/setlocale/ru">RU</a>
                        <a class="ml-1" href="/setlocale/en">EN</a>
                    </div>
                    
                        
                        
                    
                    <div class="account-panel ml-auto mt-auto mb-2">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="#"><?php echo e(Auth::user()->fio); ?></a>
                        <a href="<?php echo e(url('/user/logout')); ?>"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <?php echo e(trans('login.logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(url('/user/logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    <?php else: ?>
                            <a class="mr-2" href="<?php echo e(url('/user/register')); ?>"><?php echo e(trans('top&middle_menu.register')); ?></a>
                            <a class="mr-2" href="<?php echo e(url('/user/login')); ?>"><?php echo e(trans('top&middle_menu.login')); ?></a>
                    <?php endif; ?>

                        <?php if(auth()->guard()->check()): ?>
                            <a class="mr-2" href="/user/account/<?php echo e(Auth::user()->id); ?>"><?php echo e(trans('top&middle_menu.my_account')); ?></a>
                            <a href="/user/cart/<?php echo e(Auth::user()->id); ?>"><i class="fas fa-shopping-cart mr-2"></i></a>
                        <?php else: ?>
                            <a href="/user/login"><i class="fas fa-shopping-cart mr-2"></i></a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <nav class="main-menu d-flex justify-content-around align-items-center">
            
            <div class="main-menu__toggler">
                     <a data-toggle="dropdown"
               aria-expanded="false"><?php echo e(trans('face.face')); ?></a>
                    <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                        <div class="d-flex">
                        <div class="dropdown-col col align-self-start">
                            <a class="dropdown-item" href="/products/1"><?php echo e(trans('main-menu_subc.all')); ?></a>
                            <a class="dropdown-item" href="/products/1/new"><?php echo e(trans('main-menu_subc.new')); ?></a>
                            </div>
                        <div class="dropdown-col col align-content-start">
                            <a class="dropdown-item" href="/products/category/10"><?php echo e(trans('face.wash')); ?></a>
                            <a class="dropdown-item" href="/products/category/11"><?php echo e(trans('face.toners')); ?></a>
                            <a class="dropdown-item" href="/products/category/12"><?php echo e(trans('face.peels')); ?></a>
                        </div>
                        <div class="dropdown-col col align-content-start">
                            <a class="dropdown-item" href="/products/category/13"><?php echo e(trans('face.face_oils')); ?></a>
                            <a class="dropdown-item" href="/products/category/14"><?php echo e(trans('face.masks')); ?></a>
                            <a class="dropdown-item" href="/products/category/15"><?php echo e(trans('face.sun_care')); ?></a>
                            <a class="dropdown-item" href="/products/category/16"><?php echo e(trans('face.lip_balms')); ?></a>
                        </div>
                        </div>t
                     </div>
            </div>
            <div class="main-menu__toggler">
                <a data-toggle="dropdown"
                   aria-expanded="false"><?php echo e(trans('hair.hair')); ?></a>
                <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                    <div class="d-flex">
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/2"><?php echo e(trans('main-menu_subc.all')); ?></a>
                        <a class="dropdown-item" href="/products/2/new"><?php echo e(trans('main-menu_subc.new')); ?></a>
                        </div>
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/category/20"><?php echo e(trans('hair.shampoo')); ?></a>
                        <a class="dropdown-item" href="/products/category/21"><?php echo e(trans('hair.conditioner')); ?></a>
                        <a class="dropdown-item" href="/products/category/22"><?php echo e(trans('hair.mask')); ?></a>
                        <a class="dropdown-item" href="/products/category/23"><?php echo e(trans('hair.scrub')); ?></a>
                    </div>
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/category/24"><?php echo e(trans('hair.serum')); ?></a>
                        <a class="dropdown-item" href="/products/category/25"><?php echo e(trans('hair.gel')); ?></a>
                        <a class="dropdown-item" href="/products/category/26"><?php echo e(trans('hair.cream')); ?></a>
                        <a class="dropdown-item" href="/products/category/27"><?php echo e(trans('hair.oil')); ?></a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="main-menu__toggler">
                <a class="p-1" data-toggle="dropdown"
                   aria-expanded="false" aria-haspopup="true"><?php echo e(trans('body.body')); ?></a>
                <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                    <div class="d-flex">
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/3"><?php echo e(trans('main-menu_subc.all')); ?></a>
                        <a class="dropdown-item" href="/products/3/new"><?php echo e(trans('main-menu_subc.new')); ?></a>
                         </div>
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/category/30"><?php echo e(trans('body.wash')); ?></a>
                        <a class="dropdown-item" href="/products/category/31"><?php echo e(trans('body.lotions_oils')); ?></a>
                        <a class="dropdown-item" href="/products/category/32"><?php echo e(trans('body.hand_wash')); ?></a>
                        <a class="dropdown-item" href="/products/category/33"><?php echo e(trans('body.hand')); ?></a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="main-menu__toggler">
                <a data-toggle="dropdown"
                   aria-expanded="false"><?php echo e(trans('oils&aromatherapy.oils&aromatherapy')); ?></a>
                <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                    <div class="d-flex">
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/4"><?php echo e(trans('main-menu_subc.all')); ?></a>
                        <a class="dropdown-item" href="/products/4/new"><?php echo e(trans('main-menu_subc.new')); ?></a>
                       </div>
                    <div class="dropdown-col col align-content-start">
                        <a class="dropdown-item" href="/products/category/40"><?php echo e(trans('oils&aromatherapy.oils')); ?></a>
                        <a class="dropdown-item" href="/products/category/41"><?php echo e(trans('oils&aromatherapy.essential_oils')); ?></a>
                        <a class="dropdown-item" href="/products/category/42"><?php echo e(trans('oils&aromatherapy.butters')); ?></a>
                        <a class="dropdown-item" href="/products/category/43"><?php echo e(trans('oils&aromatherapy.mists')); ?></a>
                    </div>
                </div>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>

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

                        <p style="color: white;"><?php echo e(trans('top&middle_menu.shop')); ?></p>
                    </div>

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-3 col-xl-2 mx-auto mb-3">
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold"><nobr><?php echo e(trans('footer.useful_links')); ?></nobr></h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><a href="<?php echo e(url('/news')); ?>"><?php echo e(trans('top&middle_menu.news')); ?></a></p>
                        <p><a href="#!"><?php echo e(trans('footer.your_account')); ?></a></p>
                        <p><a href="https://cosmeticsinfo.org/whats-my-products"><?php echo e(trans('footer.ingredients_database')); ?></a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold"><?php echo e(trans('footer.contact')); ?></h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><a href="<?php echo e(url('/how_to_find_us')); ?>"><?php echo e(trans('top&middle_menu.how_to_find_us')); ?></a></p>

                        <p style="color: white;"><i class="fas fa-home mr-3"></i>г. Севастополь ул.Университетская д.1 оф.255, Россия</p>
                        <p style="color: white;"><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                        <p style="color: white;"><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>

                        
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

<?php /* /home/nastya/www/elina/resources/views/layouts/app.blade.php */ ?>