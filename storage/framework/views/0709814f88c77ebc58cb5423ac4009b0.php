<?php $__env->startSection('form'); ?>
    <?php echo e(method_field('PUT')); ?>

    <div class="form-group col-md-6">
        <label for="number">رقم الغرفة <span class="text-danger">*</span></label>
        <input type="number" name="number" value="<?php echo e(old('number', $room->number)); ?>" class="form-control" id="number">
        <?php if($errors->has('number')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('number')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-6">
        <label for="floor">رقم الدور<span class="text-danger">*</span></label>
        <select name="floor" class="form-control custom-select rounded-0">
            <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($row->id); ?>" <?php echo e(old('floor', $room->floor_id) == $row->id ? 'selected' : ''); ?>>
                    <?php echo e($row->number); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('floor')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('floor')); ?></small>
            </span>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/room/edit.blade.php ENDPATH**/ ?>