<?php use App\Arrays\Lists; ?>


<?php $__env->startSection('content'); ?>
    <div class="hold-transition login-page mt-3 bg-white">
        <div class="container text-right">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><?php echo e('انشاء حساب'); ?></div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="address"><?php echo e('الاسم'); ?><span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="<?php echo e(old('name')); ?>"
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
                                            <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="phone_no"><?php echo e('رقم الهاتف'); ?><span class="text-danger">*</span></label>
                                    <input type="number" name="phone_no" value="<?php echo e(old('phone_no')); ?>" onkeyup="checkPhoneNumber()"
                                        class="form-control <?php $__errorArgs = ['phone_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phonenumber">
                                    <small id="invalidPhoneNo" class="form-text text-danger" hidden></small>
                                    <?php if($errors->has('phone_no')): ?>
                                        <span class="help-block">
                                            <small class="form-text text-danger"><?php echo e($errors->first('phone_no')); ?></small>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="username"><?php echo e('اسم المستخدم'); ?><span class="text-danger">*</span></label>
                                    <input type="text" name="username" value="<?php echo e(old('username')); ?>"
                                        class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="username">
                                    <?php if($errors->has('username')): ?>
                                        <span class="help-block">
                                            <small class="form-text text-danger"><?php echo e($errors->first('username')); ?></small>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="image"><?php echo e('الصورة'); ?></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" value="<?php echo e(old('image')); ?>" class="custom-file-input" name="image" id="image">
                                            <label class="custom-file-label" for="image"></label>
                                            <?php if($errors->has('image')): ?>
                                                <span class="help-block">
                                                    <small class="form-text text-danger"><?php echo e($errors->first('image')); ?></small>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="khalil">
                                        <div class="card-header">
                                            <h3 class="card-title"><?php echo e('معلومات الدخول'); ?> <span class="text-danger">*</span></h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="email"><?php echo e('البريد الالكتروني'); ?></label>
                                                    <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email">
                                                    <?php if($errors->has('email')): ?>
                                                        <span class="help-block">
                                                            <small class="form-text text-danger"><?php echo e($errors->first('email')); ?></small>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label"><?php echo e('كلمة السر'); ?></label>
                                                    <input id="password" type="password" name="password"
                                                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <?php if($errors->has('password')): ?>
                                                        <span class="help-block">
                                                            <small class="form-text text-danger"><?php echo e($errors->first('password')); ?></small>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label"><?php echo e('تأكيد كلمة السر'); ?></label>
                                                    <input onkeyup="checkPassword()" id="password_confirmation" type="password"
                                                        name="password_confirmation"
                                                        class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <small class="form-text text-danger" id="inalidPasswordConfirmation"
                                                        hidden><?php echo e(__('Not Matched')); ?></small>
                                                    <?php if($errors->has('password_confirmation')): ?>
                                                        <span class="help-block">
                                                            <small class="form-text text-danger"><?php echo e($errors->first('password_confirmation')); ?></small>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div><!-- /.card-body -->
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e('حفظ'); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\E-Shop\Electronic Store\resources\views/auth/register.blade.php ENDPATH**/ ?>