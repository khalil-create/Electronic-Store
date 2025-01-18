<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>

    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td><?php echo e($row->number); ?></td>
            <td><?php echo e($row->name); ?></td>
            <td> <?php echo e($row->branch->number); ?></td>
            <td> <?php echo e($row->floor->number); ?></td>
            <td> <?php echo e($row->type_location); ?></td>
            <td>
                
                <a href="#" title="تعديل"><i class="fas fa-edit EditBtn"></i></a>
                <input type="hidden" class="url-edit" value="<?php echo e($urls['edit']); ?><?php echo e($row->id); ?>">
                <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
                <a type="button" title="حذف"><i class="fas fa-trash DeleteBtn"></i></a>
                <input type="hidden" class="url-delet" value="<?php echo e($urls['delete']); ?><?php echo e($row->id); ?>">
                <a type="button" title="اضافة الى غرفة"><i class="fas fa-plus-circle AddToRoomBtn"></i></a>
                
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links-pagination'); ?>
    <?php echo $locations->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <div id="add-edit-pop-form">
        <div class="form-group col-md-4">
            <label for="number">رقم الموقع <span class="text-danger">*</span></label>
            <input type="number" name="number" value="<?php echo e(old('number', App\Models\Location::getSequenceNo())); ?>" class="form-control" id="number">
            <?php if($errors->has('number')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('number')); ?></small>
                </span>
            <?php endif; ?>

        </div>
        <div class="form-group col-md-3">
            <label for="name">الاسم<span class="text-danger">*</span></label>
            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name">
            <?php if($errors->has('name')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label for="branch">رقم الفرع<span class="text-danger">*</span></label>
            <select name="branch_id" class="form-control custom-select rounded-0" id="branch_id">
                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" <?php echo e(old('branch') == $row->id ? 'selected' : ''); ?>>
                        <?php echo e($row->number); ?> <?php echo e('-'); ?> <?php echo e($row->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('branch_id')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('branch_id')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label for="floor">رقم الدور<span class="text-danger">*</span></label>
            <select name="floor_id" class="form-control custom-select rounded-0" id="floor_id">
                <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" <?php echo e(old('floor_id') == $row->id ? 'selected' : ''); ?>>
                        <?php echo e($row->number); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('floor_id')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('floor_id')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            <label class="control-label">نوع الموقع</label>
            <select name="type_location" class="form-control custom-select rounded-0" id="type_location">
                <option value="1" selected>غرفة </option>
                <option value="0">أدمن</option>
            </select>
            <?php if($errors->has('type_location')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('type_location')); ?></small>
                </span>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script2'); ?>
<script src="<?php echo e(asset('js/admin/branch.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/location/manage.blade.php ENDPATH**/ ?>