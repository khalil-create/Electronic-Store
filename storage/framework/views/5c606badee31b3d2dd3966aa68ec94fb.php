<?php $__env->startSection('content'); ?>
    <div class="container">
        <form action="<?php echo e(route('home')); ?>" method="GET" class="d-flex" data-turbo="true" data-turbo-frame="posts"
            data-turbo-action="advance">
            <?php echo csrf_field(); ?>

            <div class="input-group mr-sm-3">
                <input type="hidden" id="token_search" value="<?php echo e(csrf_token()); ?>">
                <input type="text" id="search" name="search" class="form-control"
                    placeholder="<?php echo e(__('Search here')); ?>">
                <input type="hidden" id="ajax_search_url" value="<?php echo e(route('posts.ajax_search')); ?>">
            </div>

            <button type="submit" href="#" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="card-body" id="ajax_responce_serarchDiv">
            <div class="row">
                <h2 class="col-md-10 float-left">Latest Posts</h2>
                <?php if(auth()->guard()->check()): ?>
                    
                    <a href="<?php echo e(route('add.post')); ?>" class="btn btn-primary float-right" title="<?php echo e(__('Add Post')); ?>">
                        <i class="fas fa-plus"></i> <?php echo e(__('Add Post')); ?>

                    </a>
                    
                <?php endif; ?>
            </div>
            <div class="row">
                
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div id="col-1" class="col-md-3 col-box">
                        <h3><a href="<?php echo e(route('show.post', $row->id)); ?>"><?php echo e($row->title); ?></a></h3>
                        <p class="card-text">
                            <small class="text-muted">
                                <a href="<?php echo e(route('profile.index', $row->user->id)); ?>"><?php echo e($row->user->name); ?></a>
                            </small>
                        </p>
                        <p>
                            <small class="text-muted"><?php echo e($row->posted_at); ?></small><br>
                            <small class="text-muted">
                                <i class="fas fa-comment" name="comments" prefix="fa-regular">
                                    <?php echo e($row->comments->count()); ?>

                                </i>

                                <?php $class_like = 'far'; ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php
                                        $class_like =
                                            App\Models\Like::where('post_id', $row->id)
                                                ->where('user_id', Auth::user()->id)
                                                ->get()
                                                ->count() > 0
                                                ? 'fas'
                                                : 'far';
                                    ?>
                                <?php endif; ?>
                                <input type="hidden" value="<?php if(auth()->guard()->check()): ?> <?php echo e(1); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>"
                                    id="is_authenticated">
                                <a href="#" title="<?php echo e(__('like')); ?>"><i
                                        class="<?php echo e($class_like); ?> fa-heart LikeBtn"></i></a>
                                <input type="hidden" class="url-like" value="/posts/like/<?php echo e($row->id); ?>">
                                <span><?php echo e($row->likes->count()); ?></span>
                            </small>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if($row->user_id == Auth::user()->id): ?>
                                    <a href="<?php echo e(route('edit.post', $row->id)); ?>" class="float-right ml-1"
                                        title="<?php echo e(__('edit post')); ?>">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12 d-flex justify-content-center">
                    <?php echo e($posts->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/admin/posts.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Blogs Projects\project\resources\views/home.blade.php ENDPATH**/ ?>