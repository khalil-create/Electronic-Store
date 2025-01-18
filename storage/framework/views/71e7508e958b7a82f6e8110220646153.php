<?php

use App\Arrays\Lists; ?>

<?php $__env->startSection('tbody'); ?>
<?php $i = 1; ?>
<?php $__currentLoopData = $comments;
$__env->addLoop($__currentLoopData);
foreach ($__currentLoopData as $row) : $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop(); ?>
    <tr class="odd">
        <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
        <td class="item-description"><?php echo e($row->content); ?></td>
        <td><a href="<?php echo e(route('show.post', $row->post_id)); ?>" title="<?php echo e(__('Post content')); ?>"><?php echo e($row->post->title); ?></a></td>
        <td><a href="<?php echo e(route('profile.index', $row->user_id)); ?>" title="<?php echo e(__('Profile')); ?>"><?php echo e($row->user->name); ?></a></td>
        <td><?php echo e($row->posted_at); ?></td>
        <td>
            <a href="#" title="<?php echo e(__('edit')); ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit EditBtn"></i></a>
            <input type="hidden" class="url-edit" value="<?php echo e($urls['edit']); ?><?php echo e($row->id); ?>">
            <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
            <a href="#" title="<?php echo e(__('delete')); ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash DeleteBtn"></i></a>
            <input type="hidden" class="url-delet" value="<?php echo e($urls['delete']); ?><?php echo e($row->id); ?>">
        </td>
    </tr>
<?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links-pagination'); ?>
<?php echo $comments->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
<div class="form-group col-md-12">
    <label class="control-label"><?php echo e(__('Author')); ?><span class="text-danger">*</span></label>
    <select name="author" value="<?php echo e(old('author')); ?>" class="form-control select2" id="author">
        <?php $__currentLoopData = $users;
        $__env->addLoop($__currentLoopData);
        foreach ($__currentLoopData as $row) : $__env->incrementLoopIndices();
            $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($row->id); ?>" <?php echo e(old('author') == $row->id ? 'selected' : ''); ?>><?php echo e($row->name); ?></option>
        <?php endforeach;
        $__env->popLoop();
        $loop = $__env->getLastLoop(); ?>
    </select>
    <?php if ($errors->has('author')) : ?>
        <span class="help-block">
            <small class="text-sm text-danger"><?php echo e($errors->first('author')); ?></small>
        </span>
    <?php endif; ?>
</div>
<div class="form-group col-md-12">
    <label><?php echo e(__('Content')); ?><span class="text-danger">*</span></label>
    <textarea name="content" id="content" cols="30" rows="6" class="form-control <?php $__errorArgs = ['content'];
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script2'); ?>
<script src="<?php echo e(asset('js/admin/comments.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\Free Host On 000webhost\Blog\Blog\resources\views/admin/comments/index.blade.php ENDPATH**/ ?>
