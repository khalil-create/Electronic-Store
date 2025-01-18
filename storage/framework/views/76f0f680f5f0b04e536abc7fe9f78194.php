<?php use App\Arrays\Lists; ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Add post')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3><?php echo e(__('Edit profile')); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form method="POST" action="<?php echo e(route('update.profile', Auth::user()->id)); ?>"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                    <div class="card-body border">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="address"><?php echo e(__('Name')); ?><span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name">
                                                <?php if($errors->has('name')): ?>
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="image"><?php echo e(__('Image')); ?></label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" value="<?php echo e(old('image')); ?>"
                                                            class="custom-file-input" name="image" id="image">
                                                        <label class="custom-file-label" for="image"></label>
                                                        <?php if($errors->has('image')): ?>
                                                            <span class="help-block">
                                                                <small
                                                                    class="form-text text-danger"><?php echo e($errors->first('image')); ?></small>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="email"><?php echo e(__('Email')); ?><span
                                                        class="text-danger">*</span></label>
                                                <input type="email" name="email"
                                                    value="<?php echo e(old('email', $user->email)); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="email">
                                                <?php if($errors->has('email')): ?>
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger"><?php echo e($errors->first('email')); ?></small>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label"><?php echo e(__('Password')); ?></label>
                                                <input id="password" type="password" name="password" class="form-control">
                                                <?php if($errors->has('password')): ?>
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger"><?php echo e($errors->first('password')); ?></small>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label"><?php echo e(__('Password Confirmation')); ?></label>
                                                <input onkeyup="checkPassword()" id="password_confirmation" type="password"
                                                    name="password_confirmation" class="form-control">
                                                <small class="form-text text-danger" id="inalidPasswordConfirmation"
                                                    hidden><?php echo e(__('Not Matched')); ?></small>
                                                <?php if($errors->has('password_confirmation')): ?>
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger"><?php echo e($errors->first('password_confirmation')); ?></small>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
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
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Blogs Projects\project\resources\views/profile/edit.blade.php ENDPATH**/ ?>