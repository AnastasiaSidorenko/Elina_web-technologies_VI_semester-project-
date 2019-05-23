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

    <script type="text/javascript" src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('js/mdb.js')); ?>"></script>
    <!-- Managers -->
    <?php echo $__env->yieldContent('js'); ?>

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
                    
                    

                    <?php if(auth()->guard()->check()): ?>
                        <a class="mr-3" href="#"><?php echo e(trans('top&middle_menu.you_are')); ?><?php echo e(Auth::user()->name); ?></a>
                        <a href="<?php echo e(url('/user/logout')); ?>"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <?php echo e(trans('login.logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(url('/admin/logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    <?php else: ?>
                        <a class="mr-2" href="<?php echo e(url('/admin/register')); ?>"><?php echo e(trans('top&middle_menu.register')); ?></a>
                        <a class="mr-2" href="<?php echo e(url('/admin/login')); ?>"><?php echo e(trans('top&middle_menu.login')); ?></a>
                    <?php endif; ?>
                </div>
    <div class="header__middle container ml-0 mt-0 mr-0 navbar-expand-lg d-flex">
        <div class="logo navbar-brand mt-0">
            <a href="/admin/home"><img class="logo__img d-inline-flex" src="<?php echo e(asset('img/200.png')); ?>"></a>
            <span class="logo__name navbar-brand font-italic d-inline-flex align-bottom">ELINA</span>
        </div>
    </div>
    <div class="p-1" style="background-color:#F7B878; m-1"></div>
</div>

<?php echo $__env->yieldContent('content'); ?>

</body>
</html>
<?php /* /home/nastya/www/elina/resources/views/admin/layout/auth.blade.php */ ?>