<?php $__env->startSection('sys-variables-old'); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sys-variables'); ?>
    <form id="myform" name="myform" method="POST" action="<?php echo e(url($urls['update-form'])); ?>"
        enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="card-body">
            <div class="form-group col-md-4">
                <label for="language">اللغة<span class="text-danger ">*</span></label>
                <select name="language" class="form-control custom-select rounded-0" id="language">
                    <?php $__currentLoopData = App\Arrays\Lists::LANGUAGES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"
                            <?php echo e(old('language', $data->language) == $key ? 'selected' : ''); ?>>
                            <?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('language')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('language')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label class="control-label">العملة<span class="text-danger">*</span></label>
                <select name="currency_id" class="form-control custom-select rounded-0" id="currency_id">
                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cur->id); ?>" <?php echo e(old('currency_id') == $cur->id ? 'selected' : ''); ?>>
                            <?php echo e($cur->name); ?> <?php echo e($cur->code); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('currency_id')): ?>
                    <span class="help-block">
                        <small class="text-sm text-danger"><?php echo e($errors->first('currency_id')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label for="priceRoom">السعر الافتراضي للغرفة<span class="text-danger">*</span></label>
                <input type="number" name="priceRoom" id="priceRoom" value="<?php echo e(old('priceRoom', $data->priceRoom)); ?>"
                    class="form-control">
                <?php if($errors->has('priceRoom')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('priceRoom')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label for="check_in_time">وقت الدخول<span class="text-danger">*</span></label>
                <input type="time" name="check_in_time" id="check_in_time" value="<?php echo e(old('check_in_time', $data->check_in_time)); ?>"
                    class="form-control">
                <?php if($errors->has('check_in_time')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('check_in_time')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-4">
                <label for="check_out_time">وقت الخروج<span class="text-danger">*</span></label>
                <input type="time" name="check_out_time" id="check_out_time" value="<?php echo e(old('check_out_time', $data->check_out_time)); ?>"
                    class="form-control">
                <?php if($errors->has('check_out_time')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('check_out_time')); ?></small>
                    </span>
                <?php endif; ?>
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
    <script src="<?php echo e(asset('js/admin/system-variables.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/system-variables/manage.blade.php ENDPATH**/ ?>