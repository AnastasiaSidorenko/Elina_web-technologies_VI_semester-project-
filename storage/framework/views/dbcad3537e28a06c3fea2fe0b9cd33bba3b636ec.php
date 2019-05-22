<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">



    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">


</head>
 <body>
        <div class="header">
            <div class="header__top">
                <nav class="top-menu top navbar navbar-expand-lg p-0 justify-content-center">
                    <a class="pr-3" href="<?php echo e(url('/news')); ?>"><?php echo e(trans('top&middle_menu.news')); ?></a>
                    <a class="pr-3" href="<?php echo e(url('/about_us')); ?>"><?php echo e(trans('top&middle_menu.about_us')); ?></a>
                </nav>
            </div>

            <div class="header__middle container ml-0 mt-0 mr-0 navbar-expand-lg d-flex">
                <div class="logo navbar-brand mt-0">
                    <img class="logo__img d-inline-flex" src="<?php echo e(asset('img/300x245.png')); ?>"></img>
                    <span class="logo__name navbar-brand font-italic d-inline-flex align-bottom">ELINA</span>
                </div>

                <div class="d-flex ml-auto flex-column">
                    <div class="language-switcher d-flex justify-content-end">
                        <a class="ml-1" href="/setlocale/ru">RU</a>
                        <a class="ml-1" href="/setlocale/en">EN</a>
                    </div>
                    <div class="search-panel ml-auto form-inline mt-auto">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <i class="fas fa-search pl-1 pr-2"></i>
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

                        <a class="mr-2" href="#"><?php echo e(trans('top&middle_menu.my_account')); ?></a>
                        
                        <i class="fas fa-shopping-cart mr-2"></i>
                    </div>
                </div>
            </div>
        </div>

        <nav class="main-menu d-flex justify-content-around align-items-center">
            
            <div class="main-menu__toggler">
                     <a data-toggle="dropdown"
               aria-expanded="false"><?php echo e(trans('face.face')); ?></a>
                    <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                        <div class="dropdown-col">
                            <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.all')); ?></a>
                            <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.new')); ?></a>
                            <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.sale')); ?></a>
                            <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.kits')); ?></a>
                        </div>
                        <div class="dropdown-col">
                            <a class="dropdown-item" href="#"><?php echo e(trans('face.wash')); ?></a>
                            <a class="dropdown-item" href="#"><?php echo e(trans('face.toners')); ?></a>
                            <a class="dropdown-item" href="#"><?php echo e(trans('face.peels')); ?></a>
                        </div>
                        <div class="dropdown-col">
                            <a class="dropdown-item" href="#"><?php echo e(trans('face.face_oils')); ?></a>
                            <a class="dropdown-item" href="#"><?php echo e(trans('face.masks')); ?></a>
                            <a class="dropdown-item" href="#"><?php echo e(trans('face.sun_care')); ?></a>
                            <a class="dropdown-item" href="#"><?php echo e(trans('face.lip_balms')); ?></a>
                        </div>
                     </div>
            </div>
            <div class="main-menu__toggler">
                <a data-toggle="dropdown"
                   aria-expanded="false"><?php echo e(trans('hair.hair')); ?></a>
                <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                    <div class="dropdown-col">
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.all')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.new')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.sale')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.kits')); ?></a>
                    </div>
                    <div class="dropdown-col">
                        <a class="dropdown-item" href="#"><?php echo e(trans('hair.shampoo')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('hair.conditioner')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('hair.mask')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('hair.scrub')); ?></a>
                    </div>
                    <div class="dropdown-col">
                        <a class="dropdown-item" href="#"><?php echo e(trans('hair.serum')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('hair.gel')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('hair.cream')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('hair.oil')); ?></a>
                    </div>
                </div>
            </div>
            <div class="main-menu__toggler">
                <a class="p-1" data-toggle="dropdown"
                   aria-expanded="false" aria-haspopup="true"><?php echo e(trans('body.body')); ?></a>
                <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                    <div class="dropdown-col">
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.all')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.new')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.sale')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.kits')); ?></a>
                    </div>
                    <div class="dropdown-col">
                        <a class="dropdown-item" href="#"><?php echo e(trans('body.wash')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('body.lotions_oils')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('body.hand_wash')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('body.hand')); ?></a>
                    </div>
                </div>
            </div>
            <div class="main-menu__toggler">
                <a data-toggle="dropdown"
                   aria-expanded="false"><?php echo e(trans('oils&aromatherapy.oils&aromatherapy')); ?></a>
                <div class="dropdown-menu dropdown-default submenu dropdown-multicol3">
                    <div class="dropdown-col">
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.all')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.new')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.sale')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('main-menu_subc.kits')); ?></a>
                    </div>
                    <div class="dropdown-col">
                        <a class="dropdown-item" href="#"><?php echo e(trans('oils&aromatherapy.oils')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('oils&aromatherapy.essential_oils')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('oils&aromatherapy.butters')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(trans('oils&aromatherapy.mists')); ?></a>
                    </div>
                </div>
            </div>
        </nav>

    
        
        
            
        
    

        <?php echo $__env->yieldContent('content'); ?>



        <footer class="page-footer font-small text-black-50">
            <!-- Footer Links -->
            <div class="container text-center text-md-left mt-5 py-1">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase font-weight-bold">Company name</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.</p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Products</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><a href="#!">MDBootstrap</a></p>
                        <p><a href="#!">MDWordPress</a></p>
                        <p><a href="#!">BrandFlow</a></p>
                        <p><a href="#!">Bootstrap Angular</a></p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><a href="#!">Your Account</a></p>
                        <p><a href="#!">Become an Affiliate</a></p>
                        <p><a href="#!">Shipping Rates</a></p>
                        <p><a href="#!">Help</a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Contact</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                        <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                    <!-- Grid row-->
                    <div class="row d-flex white-text m-0">
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-6 col-lg-7 text-right text-md-right">
                            <!-- Facebook -->
                            <a class="fb-ic"><i class="fab fa-facebook-f mr-4"></i></a>
                            <a><i class="fab fa-vk mr-4"></i></a>
                            <!-- Google +-->
                            <a class="gplus-ic"><i class="fab fa-google-plus-g mr-4"></i></a>
                            <!--Instagram-->
                            <a class="ins-ic"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                <!-- Grid row -->
            </div>
            <!-- Footer Links -->
            <!-- Copyright -->
             <div class="footer-copyright text-center py-1">© 2018 Copyright:
                  <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
             </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

        <script type="text/javascript" src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="<?php echo e(asset('js/mdb.js')); ?>"></script>
    </body>
</html>

<?php /* /home/nastya/www/elina/resources/views/layouts/app.blade.php */ ?>