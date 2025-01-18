<?php $__env->startSection('sys-variables'); ?>
    <form id="myform" name="myform" method="POST" action="<?php echo e(url($urls['update-form'])); ?>"
        enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="card-body">
            <div class="form-group col-md-4">
                <label for="site_name"><?php echo e('اسم الموقع'); ?><span class="text-danger">*</span></label>
                <input type="text" name="site_name" id="site_name" value="<?php echo e(old('site_name', $data->site_name)); ?>"
                    class="form-control <?php $__errorArgs = ['site_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php if($errors->has('site_name')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('site_name')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label for="site_phone"><?php echo e('رقم هاتف الموقع'); ?><span class="text-danger">*</span></label>
                <input type="text" name="site_phone" id="site_phone" value="<?php echo e(old('site_phone', $data->site_phone)); ?>"
                    class="form-control <?php $__errorArgs = ['site_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php if($errors->has('site_phone')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('site_phone')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label for="currency"><?php echo e('العملة'); ?><span class="text-danger ">*<?php echo e($has_items?' (لايمكنك التعديل)':''); ?></span></label>
                
                <select name="currency" class="form-control custom-select rounded-0 <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="currency"
                    onchange="<?php echo e($has_items ? 'this.selectedIndex = this.defaultIndex;' : ''); ?>" <?php if($has_items): echo 'readonly'; endif; ?>>
                    <?php $__currentLoopData = App\Arrays\Lists::CURRENCIES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"
                            <?php echo e(old('currency', $data->currency) == $key ? 'selected' : ''); ?>>
                            <?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('currency')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('currency')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label for="facebook_url"><?php echo e('رابط الموقع على الفيسبوك'); ?><span class="text-danger">*</span></label>
                <input type="text" name="facebook_url" id="facebook_url" value="<?php echo e(old('facebook_url', $data->facebook_url)); ?>"
                    class="form-control <?php $__errorArgs = ['facebook_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php if($errors->has('facebook_url')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('facebook_url')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label for="tweeter_url"><?php echo e('رابط الموقع على تويتر'); ?><span class="text-danger">*</span></label>
                <input type="text" name="tweeter_url" id="tweeter_url" value="<?php echo e(old('tweeter_url', $data->tweeter_url)); ?>"
                    class="form-control <?php $__errorArgs = ['tweeter_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php if($errors->has('tweeter_url')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('tweeter_url')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label for="address"><?php echo e('العنوان'); ?><span class="text-danger">*</span></label>
                <input type="text" name="address" id="address" value="<?php echo e(old('address', $data->address)); ?>"
                    class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php if($errors->has('address')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('address')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label for="image_logo"><?php echo e('شعار الموقع'); ?></label>
                <div class="input-group">
                    <div class="custom-file col-md-8">
                        <input type="file" value="<?php echo e(old('image_logo')); ?>" class="custom-file-input <?php $__errorArgs = ['image_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image_logo" id="image_logo">
                        <label class="custom-file-label" for="image_logo"></label>
                        <?php if($errors->has('image_logo')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('image_logo')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="navbar-brand col-md-4">
                        <a href="#" class="brand-link" style="display: inline">
                            <img src="<?php echo e(asset('designImages/')); ?>/<?php echo e($data->image_logo ? $data->image_logo : 'logo.png'); ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <button id="save" type="submit" class="btn btn-primary font">
                حفظ<i class="fas fa-save"></i>
            </button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links-pagination'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js2/admin/system-variables.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\E-Shop\Electronic Store\resources\views/admin/system-variables/index.blade.php ENDPATH**/ ?>