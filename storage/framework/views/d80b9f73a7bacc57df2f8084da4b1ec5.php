<?php $__env->startSection('title'); ?>
<?php echo e(__('Show post')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <section class="content">
        <div class="card-body">
            <div class="col-12 col-sm-6 col-md-12 col-box">
                <h2><?php echo e($post->title); ?></h2>
                <p class="card-text mb-3">
                    <small class="text-muted">
                        <a href="<?php echo e(route('profile.index', $post->user->id)); ?>"><?php echo e($post->user->name); ?></a>,
                        <small class="text-muted"><?php echo e($post->posted_at); ?></small>
                    </small>
                </p>
                <p class="item-description"><?php echo e($post->content); ?></p>
                <p>
                    <?php $__currentLoopData = explode(",", $post->tags);
                    $__env->addLoop($__currentLoopData);
                    foreach ($__currentLoopData as $tag) : $__env->incrementLoopIndices();
                        $loop = $__env->getLastLoop(); ?>
                        <a href="#">#<?php echo e($tag); ?></a>
                    <?php endforeach;
                    $__env->popLoop();
                    $loop = $__env->getLastLoop(); ?>
                </p>
                <?php $class_like = 'far'; ?>
                <?php if (auth()->guard()->check()) : ?>
                    <?php
                    $class_like = App\Models\Like::where('post_id', $post->id)->where('user_id', Auth::user()->id)->get()->count() > 0 ? 'fas' : 'far';
                    ?>
                <?php endif; ?>
                <p>
                <p class="text-muted">
                    <a href="#" title="<?php echo e(__('like')); ?>"><i class="<?php echo e($class_like); ?> fa-heart LikeBtn"></i></a>
                    <input type="hidden" class="url-like" value="/posts/like/<?php echo e($post->id); ?>">
                    <span><?php echo e($post->likes->count()); ?></span>
                </p>
                </p>
            </div>
            <h2><?php echo e($post->comments->count()); ?> <?php echo e(__('comments')); ?></h2>
            <?php if (auth()->guard()->check()) : ?>
                <div class="form-group col-md-12 col-box">
                    <form method="POST" action="<?php echo e(route('comment.post', $post->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <textarea name="content" placeholder="your comment" id="form" cols="30" rows="6" class="form-control <?php $__errorArgs = ['content'];
                                                                                                                                        $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                                                                                                                                        if ($__bag->has($__errorArgs[0])) :
                                                                                                                                            if (isset($message)) {
                                                                                                                                                $__messageOriginal = $message;
                                                                                                                                            }
                                                                                                                                            $message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
                                                                                                                                            if (isset($__messageOriginal)) {
                                                                                                                                                $message = $__messageOriginal;
                                                                                                                                            }
                                                                                                                                        endif;
                                                                                                                                        unset($__errorArgs, $__bag); ?>"><?php echo e(old('content')); ?></textarea>
                                <?php if ($errors->has('content')) : ?>
                                    <span class="help-block">
                                        <small class="form-text text-danger"><?php echo e($errors->first('content')); ?></small>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary float-right">
                                    <?php echo e(__('Comment')); ?> <i class="fas fa-solid fa-paper-plane fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php else : ?>
                <div class="alert-danger col-md-12 col-box">
                    <span>
                        <?php echo e(__('You must be signed in to comment.')); ?>

                        <a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </span>
                </div>
            <?php endif; ?>
            <?php $__currentLoopData = $post->comments;
            $__env->addLoop($__currentLoopData);
            foreach ($__currentLoopData as $row) : $__env->incrementLoopIndices();
                $loop = $__env->getLastLoop(); ?>
                <div id="col-1" class="col-12 col-sm-6 col-md-12 col-box">
                    <h5><a href="<?php echo e(route('profile.index', $row->user->id)); ?>"><?php echo e($row->user->name); ?></a></h5>
                    <p class="card-text"><?php echo e($row->content); ?></p>
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
        </div><!-- /.card-body -->
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/admin/posts.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\Free Host On 000webhost\Blog\Blog\resources\views/posts/show.blade.php ENDPATH**/ ?>
