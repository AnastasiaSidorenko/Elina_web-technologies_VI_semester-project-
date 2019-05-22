<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(trans('login.login')); ?></div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/admin/login')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> row">
                                <label for="email" class="col-md-4 control-label text-md-right"><?php echo e(trans('login.email')); ?></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> row">
                                <label for="password" class="col-md-4 control-label text-md-right"><?php echo e(trans('login.password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autofocus>

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> <?php echo e(trans('login.remember_me')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-deep-purple">
                                        <?php echo e(trans('login.login')); ?>

                                    </button>

                                    
                                    
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/nastya/www/elina/resources/views/admin/auth/login.blade.php */ ?>