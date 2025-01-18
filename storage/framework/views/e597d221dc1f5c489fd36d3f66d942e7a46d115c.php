<?php $__env->startSection('form'); ?>
    <?php echo e(method_field('PUT')); ?>

    <div class="form-group">
        <label for="name">اسم النوع <span class="text-danger">*</span></label>
        <input type="text" name="name" value="<?php echo e(old('name', $reserveType->name)); ?>" class="form-control" id="name">
        <?php if($errors->has('name')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
            </span>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/reservation/type/edit.blade.php ENDPATH**/ ?>