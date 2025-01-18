<?php $__env->startSection('title'); ?>
    <?php echo e(__('Edit post')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3><?php echo e(__('Edit post')); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <form method="POST" action="<?php echo e(route('update.post', $post->id)); ?>"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title"><?php echo e(__('Title')); ?><span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="title"
                                                    value="<?php echo e(old('title', $post->title)); ?>" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="title">
                                                <?php if($errors->has('title')): ?>
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger"><?php echo e($errors->first('title')); ?></small>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label><?php echo e(__('Content')); ?><span class="text-danger">*</span></label>
                                                <textarea name="content" id="content" cols="30" rows="6" placeholder="content..." class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('content', $post->content)); ?></textarea>
                                                <?php if($errors->has('content')): ?>
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger"><?php echo e($errors->first('content')); ?></small>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary font" style="margin: 10px">
                                                    <?php echo e(__('Save')); ?> <i class="fas fa-save"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </form>
                                </div><!-- /.form-group -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Blogs Projects\project\resources\views/posts/edit.blade.php ENDPATH**/ ?>