    
        
            
                

                
                    
                
            
        
    




<?php $__env->startSection('content'); ?>
    <div class="container">
        <!--    <div class="row justify-content-left"> -->
        <div class="col-md-15">
            <div class="card text-center">
                <div class="card-body">
                    <div class="table">
                        <table border>
                            <tr>
                                <th><?php echo e(trans('admin.name')); ?></th><th><?php echo e(trans('admin.email')); ?></th><th><?php echo e(trans('admin.role')); ?></th>
                            </tr> <!--ряд с ячейками заголовков-->
                            <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($manager->name); ?></td>
                                    <td><?php echo e($manager->email); ?></td>
                                    <td><?php echo e($manager->role); ?></td>
                                </tr> <!--ряд с ячейками тела таблицы-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                    <?php echo e($managers->links()); ?>

                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/nastya/www/elina/resources/views/admin/manage.blade.php */ ?>