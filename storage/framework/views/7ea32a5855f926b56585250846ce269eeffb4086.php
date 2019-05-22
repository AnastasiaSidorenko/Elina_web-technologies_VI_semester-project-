<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header"><?php echo e(trans('login.auth')); ?></div>

                <div class="card-body">
                    <?php echo e(trans('login.you_are_logged_in')); ?><?php echo e(Auth::user()->fio); ?>!
                </div>
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/nastya/www/elina/resources/views/user/home.blade.php */ ?>