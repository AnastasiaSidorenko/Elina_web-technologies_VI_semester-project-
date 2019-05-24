<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/contentManagers.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span><?php echo e(trans('admin.content_managers')); ?></span>
                        <button type="button" onclick="location.href='/admin/register'" class="btn btn-amber pull-right" ><?php echo e(trans('admin.create')); ?></button>
                    </div>
                    <div class="card-body text-center">
                        <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <tr>
                                <th>ID</th><th><?php echo e(trans('admin.name')); ?></th><th><?php echo e(trans('admin.email')); ?></th><th><?php echo e(trans('admin.role')); ?></th><th width="10%"></th></tr>
                            <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr id='TR<?php echo e($m->id); ?>'>
                                    <td><?php echo e($m->id); ?></td>
                                    <td><?php echo e($m->name); ?></td>
                                    <td><?php echo e($m->email); ?></td>
                                    <td id="TdEdit">
                                        <div id="role" class="edit" data-id="<?php echo e($m->id); ?>" contenteditable><?php echo e($m->role); ?></div>
                                    </td>
                                    <td><button id='<?php echo e($m->id); ?>' onclick='deleteManagers(<?php echo e($m->id); ?>)'><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                    <?php echo e($managers->links()); ?>

                </div>
            </div>
        </div>
    </div>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/nastya/www/elina/resources/views/admin/manage.blade.php */ ?>