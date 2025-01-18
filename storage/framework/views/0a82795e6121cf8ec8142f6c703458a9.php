<?php $__env->startSection('form'); ?>
    <div class="form-group col-md-6">
        <label for="number">رقم الفرع <span class="text-danger">*</span></label>
        <input type="number" name="number" value="<?php echo e(old('number')); ?>" class="form-control" id="number">
        <?php if($errors->has('number')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('number')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-6">
        <label for="name">اسم الفرع<span class="text-danger">*</span></label>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name">
        <?php if($errors->has('name')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-6">
        <label for="address">عنوان الفرع<span class="text-danger">*</span></label>
        <input type="text" name="address" value="<?php echo e(old('address')); ?>" class="form-control" id="address">
        <?php if($errors->has('address')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('address')); ?></small>
            </span>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/branch/add.blade.php ENDPATH**/ ?>