<?php $__env->startSection('form'); ?>
    <?php echo e(method_field('PUT')); ?>

    <div class="form-group col-md-6">
        <label for="number">رقم الدور <span class="text-danger">*</span></label>
        <input type="number" name="number" value="<?php echo e(old('number', $floor->number)); ?>" class="form-control" id="number">
        <?php if($errors->has('number')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('number')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-6">
        <label for="branch">رقم الفرع<span class="text-danger">*</span></label>
        <select name="branch" class="form-control custom-select rounded-0">
            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($row->id); ?>" <?php echo e(old('branch', $floor->branch_id) == $row->id ? 'selected' : ''); ?>>
                    <?php echo e($row->number); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('branch')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('branch')); ?></small>
            </span>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/floor/edit.blade.php ENDPATH**/ ?>