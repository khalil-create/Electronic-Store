<?php $__env->startSection('title'); ?>
    <?php echo e(__('Profile')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-box">
                    <a href="<?php echo e(route('profile.index', $user->id)); ?>" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i> <?php echo e(__('Back')); ?>

                    </a>
                    <div class="text-center mb-2">
                        <div class="image">
                            <?php if($user->image): ?>
                                <img src="<?php echo e(asset('images/users/' . $user->image)); ?>"
                                    class="img-circle elevation-2 profile-img" alt="User Image">
                            <?php else: ?>
                                <img src="<?php echo e(asset('designImages/user.png')); ?>" class="img-circle elevation-2"
                                    alt="User Image">
                            <?php endif; ?>
                        </div>
                        <h2 class="mb-0"><?php echo e($user->name); ?></h2>
                        <small class="card-subtitle mb-2 text-muted"><?php echo e($user->email); ?></small>

                        <?php if($user->id != auth()->id()): ?>
                            
                            <!-- Follow button -->
                            <?php if(!auth()->user()->followedUsers->contains("user_id", $user->id)): ?>
                                <form action="<?php echo e(route('users.follow', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-primary" title="<?php echo e(__('Follow ').$user->name); ?>">
                                        <i class="fas fa-plus-circle"></i> <?php echo e(__('Follow')); ?>

                                    </button>
                                    
                                </form>
                            <?php else: ?>
                                <!-- Unfollow button -->
                                <form action="<?php echo e(route('users.unfollow', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-secondary" title="<?php echo e(__('Unfollow ').$user->name); ?>">
                                        <i class="fas fa-check-circle"></i> <?php echo e(__('Following')); ?>

                                    </button>
                                    
                                </form>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="card-text row mt-3">
                            <div class="col-md-3">
                                <span class="text-muted d-block"><?php echo e(__('Followers')); ?></span>
                                <?php echo e($user->followers->count()); ?>

                            </div>
                            <div class="col-md-3">
                                <span class="text-muted d-block"><?php echo e(__('Comments')); ?></span>
                                <?php echo e($user->comments->count()); ?>

                            </div>

                            <div class="col-md-3">
                                <span class="text-muted d-block"><?php echo e(__('Posts')); ?></span>
                                <?php echo e($user->posts->count()); ?>

                            </div>

                            <div class="col-md-3">
                                <span class="text-muted d-block"><?php echo e(__('Likes')); ?></span>
                                <?php echo e($user->likes->count()); ?>

                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header">
                                <h3><?php echo e(__('Followers')); ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                
                                    <?php if($user->followers->count()): ?>
                                        <?php $__currentLoopData = $user->followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row">
                                                <div class="btn btn-default">
                                                    <a href="<?php echo e(route('profile.index', $row->follower->id)); ?>">
                                                        <div class="image">
                                                            <?php if($row->follower->image): ?>
                                                                <img src="<?php echo e(asset('images/users/' . $row->follower->image)); ?>"
                                                                    class="img-circle elevation-2 profile-img2" alt="User Image">
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('designImages/user.png')); ?>" class="img-circle elevation-2 profile-img2"
                                                                    alt="User Image">
                                                            <?php endif; ?>
                                                            <strong class="ml-3 d-none d-md-inline"><?php echo e($row->follower->name); ?> </strong>
                                                            
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="custom-hr">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="alert-danger col-md-12 col-box">
                                            <span><?php echo e(__('There is no any follower')); ?></span>
                                        </div>
                                    <?php endif; ?>
                                
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/admin/posts.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\Free Host On 000webhost\Blog\Blog\resources\views/profile/followers.blade.php ENDPATH**/ ?>