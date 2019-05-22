<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-center">
        <ul class="list-group">
            <li class="list-group-item list-group-item-warning"><a href="managers"><?php echo e(trans('admin.content_managers')); ?></a></li>
            
            
            
            
            
            
            
            
            
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/nastya/www/elina/resources/views/admin/home.blade.php */ ?>