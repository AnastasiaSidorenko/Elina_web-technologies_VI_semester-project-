<?php $__env->startSection('content'); ?>
    
    <div class="main-menu__toggler admin__menu d-flex justify-content-around align-items-center">
        <a href="managers"><?php echo e(trans('admin.content_managers')); ?></a>
        <a href="products"><?php echo e(trans('admin.products')); ?></a>
        <a href="news"><?php echo e(trans('admin.news')); ?></a>
        <a href="orders"><?php echo e(trans('admin.orders')); ?></a>
        <a href="manufacturers"><?php echo e(trans('admin.manufacturers')); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/nastya/www/elina/resources/views/admin/home.blade.php */ ?>