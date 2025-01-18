<?php if(@isset($posts) && !@empty($posts) && count($posts) > 0): ?>
    <h2>Latest Posts</h2>
    <div class="row">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="col-1" class="col-12 col-sm-6 col-md-3 col-box">
                <h3><a href="<?php echo e(route('show.post', $row->id)); ?>"><?php echo e($row->title); ?></a></h3>
                <p class="card-text">
                    <small class="text-muted">
                        <a href="<?php echo e(route('profile.index', $row->user_id)); ?>"><?php echo e($row->user_name); ?></a>
                    </small>
                </p>
                <p>
                    <small class="text-muted"><?php echo e($row->posted_at); ?></small><br>
                    <small class="text-muted">
                        <i class="fas fa-comment" name="comments" prefix="fa-regular"> <?php echo e($row->comments_count); ?> </i>

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
                        <a href="#" title="<?php echo e(__('like')); ?>"><i
                                class="<?php echo e($class_like); ?> fa-heart LikeBtn"></i></a>
                        <input type="hidden" class="url-like" value="/posts/like/<?php echo e($row->id); ?>">
                        <span><?php echo e($row->likes_count); ?></span>
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
        <div class="col-md-12 d-flex justify-content-center" id="ajax_pagination_in_search">
            <?php echo e($posts->links()); ?>

        </div>
    </div>
    
<?php else: ?>
    <div class="alert alert-danger">
        <?php echo e(__('There is no data found for search')); ?>

    </div>
<?php endif; ?>
<?php /**PATH F:\Open Source Systems\Blogs Projects\project\resources\views/posts/ajax_search.blade.php ENDPATH**/ ?>