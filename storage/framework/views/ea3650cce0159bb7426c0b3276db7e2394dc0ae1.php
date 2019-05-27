<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/contentManagers.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('js/addons/datatables.min.js')); ?>"></script>
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
                        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead> <tr>
                                <th>ID</th><th><?php echo e(trans('admin.name')); ?></th><th><?php echo e(trans('admin.email')); ?></th><th><?php echo e(trans('admin.role')); ?></th><th width="5%"><th width="5%"></th></tr>
                            </thead>
                            <tbody><?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($m->id!=Auth::user()->id): ?>
                                <tr id='TR<?php echo e($m->id); ?>'>
                                    <td><?php echo e($m->id); ?></td>
                                    <td id="TR<?php echo e($m->id); ?>TD1"><?php echo e($m->name); ?></td>
                                    <td><?php echo e($m->email); ?></td>
                                    <td id="TR<?php echo e($m->id); ?>TD2"><?php echo e($m->role); ?></td>
                                    <td><button id='<?php echo e($m->id); ?>' onclick='deleteManagers(<?php echo e($m->id); ?>)'><i class="fas fa-trash-alt"></i></button></td>
                                    <td><button data-toggle="modal" data-target="#edit" onclick='editManagers(<?php echo e($m->id); ?>)'><i class="fas fa-edit"></i></button></td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php echo e($managers->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editLabel"><?php echo e(trans('news.edit')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_edit">ID</label>
                        <input type="text" class="form-control" id="id_edit" readonly>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_edit"><?php echo e(trans('admin.name')); ?></label>
                        <input type="text" class="form-control" id="name_edit">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="role_edit"><?php echo e(trans('admin.role')); ?></label>
                        <textarea type="text" class="form-control" id="role_edit"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-deep-orange" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                    <button id="save_edit" type="button" class="btn btn-pink"><?php echo e(trans('admin.save')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/nastya/www/elina/resources/views/admin/manage.blade.php */ ?>