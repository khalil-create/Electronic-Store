<?php $__env->startSection('title'); ?>
<?php echo e(__('Profile')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 col-box">
                <div class="text-center mb-2">
                    <div class="image">
                        <?php if ($user->image) : ?>
                            <img src="<?php echo e(asset('images/users/' . $user->image)); ?>" class="img-circle elevation-2 profile-img" alt="User Image">
                        <?php else : ?>
                            <img src="<?php echo e(asset('designImages/user.png')); ?>" class="img-circle elevation-2" alt="User Image">
                        <?php endif; ?>
                    </div>
                    <h2 class="mb-0"><?php echo e($user->name); ?></h2>
                    <small class="card-subtitle mb-2 text-muted"><?php echo e($user->email); ?></small>
                    <?php if (auth()->guard()->check()) : ?>
                        <?php if ($user->id != auth()->id()) : ?>

                            <!-- Follow button -->
                            <?php if (!auth()->user()->followedUsers->contains("user_id", $user->id)) : ?>
                                <form action="<?php echo e(route('users.follow', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-primary" title="<?php echo e(__('Follow ') . $user->name); ?>">
                                        <i class="fas fa-plus-circle"></i> <?php echo e(__('Follow')); ?>

                                    </button>

                                </form>
                            <?php else : ?>
                                <!-- Unfollow button -->
                                <form action="<?php echo e(route('users.unfollow', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-secondary" title="<?php echo e(__('Unfollow ') . $user->name); ?>">
                                        <i class="fas fa-check-circle"></i> <?php echo e(__('Following')); ?>

                                    </button>

                                </form>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="card-text row mt-3">
                        <div class="col-md-3">
                            <span class="text-muted d-block"><?php echo e(__('Followers')); ?></span>

                            <a href="<?php echo e(route('user.followers', $user->id)); ?>" title="<?php echo e(__('followers')); ?>"><?php echo e($user->followers->count()); ?></a>
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
                </div>
                <?php if (auth()->guard()->check()) : ?>
                    <?php if ($user->id == Auth::user()->id) : ?>
                        <a href="<?php echo e(route('profile.edit', Auth::user()->id)); ?>" class="btn btn-primary btn-sm float-right" title="<?php echo e(__('edit profile')); ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <h2 class="col-md-11 float-left"><?php echo e(__('Last Posts')); ?></h2>
                    <?php if (auth()->guard()->check()) : ?>
                        <?php if ($user->id == Auth::user()->id) : ?>
                            <a href="<?php echo e(route('add.post')); ?>" class="btn btn-primary float-right" title="<?php echo e(__('Add post')); ?>">
                                <i class="fas fa-plus"></i>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php if ($user->posts->count()) : ?>
                    <?php $__currentLoopData = $user->posts;
                    $__env->addLoop($__currentLoopData);
                    foreach ($__currentLoopData as $row) : $__env->incrementLoopIndices();
                        $loop = $__env->getLastLoop(); ?>
                        <div id="col-1" class="col-12 col-sm-6 col-md-12 col-box">
                            <h3><a href="<?php echo e(route('show.post', $row->id)); ?>"><?php echo e($row->title); ?></a></h3>
                            <p>
                                <small class="text-muted"><?php echo e($row->posted_at); ?></small><br>
                                <small class="text-muted">
                                    <i class="fas fa-comment" name="comments" prefix="fa-regular">
                                        <?php echo e($row->comments->count()); ?> </i>

                                    <i class="fas ml-2 fa-heart" aria-hidden="true"></i>
                                    <span><?php echo e($row->likes->count()); ?></span>
                                </small>
                                <?php if (auth()->guard()->check()) : ?>
                                    <?php if ($row->user_id == Auth::user()->id) : ?>
                                        <a href="<?php echo e(route('edit.post', $row->id)); ?>" class="float-right ml-1" title="<?php echo e(__('edit post')); ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <input type="hidden" value="/posts/delete/<?php echo e($row->id); ?>" class="url-delet">
                                        <a href="#" class="float-right ItemDeleteBtn" title="<?php echo e(__('delete post')); ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endforeach;
                    $__env->popLoop();
                    $loop = $__env->getLastLoop(); ?>
                <?php else : ?>
                    <div class="alert-danger col-md-12 col-box">
                        <span><?php echo e(__('There is no any post')); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-2">
                <h2><?php echo e(__('Last Comments')); ?></h2>
                <?php if ($user->comments->count()) : ?>
                    <?php $__currentLoopData = $user->comments;
                    $__env->addLoop($__currentLoopData);
                    foreach ($__currentLoopData as $row) : $__env->incrementLoopIndices();
                        $loop = $__env->getLastLoop(); ?>
                        <div id="col-1" class="col-12 col-sm-6 col-md-12 col-box">
                            <h3>Posted on <a href="<?php echo e(route('show.post', $row->id)); ?>"><?php echo e($row->post->title); ?></a>
                            </h3>
                            <p class="card-text">
                                <small class="text-muted item-description"><?php echo e($row->content); ?></small>
                            </p>
                            <p>
                                <small class="text-muted"><?php echo e($row->posted_at); ?></small>
                                <?php if (auth()->guard()->check()) : ?>
                                    <?php if ($row->user_id == Auth::user()->id) : ?>

                                        <input type="hidden" value="/comments/delete/<?php echo e($row->id); ?>" class="url-delet">
                                        <a href="#" class="float-right ItemDeleteBtn" title="<?php echo e(__('delete comment')); ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endforeach;
                    $__env->popLoop();
                    $loop = $__env->getLastLoop(); ?>
                <?php else : ?>
                    <div class="alert-danger col-md-12 col-box">
                        <span><?php echo e(__('There is no any comment')); ?></span>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/admin/posts.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Blogs Projects\project\resources\views/profile/index.blade.php ENDPATH**/ ?>
