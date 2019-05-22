<?php $__env->startSection('title','Main page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="container">
                    <?php
                    session_start();
                    if(Session::get('locale')=='en'){
                        $body='body_'.'en';
                        $title='title_'.'en';
                    }
                    else{
                        $body='body_'.'ru';
                        $title='title_'.'ru';
                    }
                    ?>
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card news_item d-flex">
                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <h4 class="card-title"><?php
                                    echo "<p class='card-text'>{{$item->$title}}</p>";
                                    ?></h4>
                                <hr>
                                <!-- Text -->
                                <?php
                                echo "<p class='card-text'>{{$item->$body}}</p>";
                                ?>
                            </div>

                            <!-- Card footer -->
                            <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                                <ul class="list-unstyled list-inline font-small">
                                    <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i><?php echo e($item->date); ?></li>
                                </ul>
                            </div>

                        </div>
                        <!-- Card -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/nastya/www/elina/resources/views/news.blade.php */ ?>