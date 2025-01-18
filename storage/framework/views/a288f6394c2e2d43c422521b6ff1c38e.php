<?php $__env->startSection('title'); ?>
    البروفايل
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-box">
                    <div class="text-center mb-2">
                        <div class="image">
                            <?php if($user->user_image): ?>
                                <img src="<?php echo e(asset('images/users/' . $user->user_image)); ?>" class="img-circle elevation-2"
                                    alt="User Image">
                            <?php else: ?>
                                <img src="<?php echo e(asset('designImages/user.png')); ?>" class="img-circle elevation-2" alt="User Image">
                            <?php endif; ?>
                        </div>
                        <h2 class="mb-0"><?php echo e($user->name); ?></h2>
                        <small class="card-subtitle mb-2 text-muted"><?php echo e($user->email); ?></small>

                        <div class="card-text row mt-3">
                            <div class="col-md-4">
                                <span class="text-muted d-block"><?php echo e(__('Comments')); ?></span>
                                <?php echo e($user->comments->count()); ?>

                            </div>

                            <div class="col-md-4">
                                <span class="text-muted d-block"><?php echo e(__('Posts')); ?></span>
                                <?php echo e($user->posts->count()); ?>

                            </div>

                            <div class="col-md-4">
                                <span class="text-muted d-block"><?php echo e(__('Likes')); ?></span>
                                <?php echo e('10'); ?>

                            </div>
                        </div>
                    </div>
                    
                        <a href="<?php echo e(route('add.post')); ?>" class="btn btn-primary btn-sm float-right">
                            <?php echo e(__('Add post')); ?>

                        </a>
                    
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h2><?php echo e(__('Last Comments')); ?></h2>
                    <div class="col-box">

                    </div>
                </div>
                <div class="col-md-6">
                    <h2><?php echo e(__('Last Posts')); ?></h2>
                    <div class="col-box">

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Blogs Projects\project\resources\views/admin/profile.blade.php ENDPATH**/ ?>