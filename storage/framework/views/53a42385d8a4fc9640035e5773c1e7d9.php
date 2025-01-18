<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>
    <?php $__currentLoopData = $assettype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td><?php echo e($row->number); ?></td>
            <td><?php echo e($row->name); ?></td>
            <td class="sorting_1"><?php echo e($row->quantity); ?></td>
            <td><?php echo e($row->asset_class); ?></td>
            <td>
                
                <a href="#" title="تعديل"><i class="fas fa-edit EditBtn"></i></a>
                <input type="hidden" class="url-edit" value="<?php echo e($urls['edit']); ?><?php echo e($row->id); ?>">
                <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
                <a type="button" title="حذف"><i class="fas fa-trash DeleteBtn"></i></a>
                <input type="hidden" class="url-delet" value="<?php echo e($urls['delete']); ?><?php echo e($row->id); ?>">
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links-pagination'); ?>
    <?php echo $assettype->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <div class="form-group col-md-2">
        <label for="number">رقم نوع الاصل <span class="text-danger">*</span></label>
        <input type="number" name="number" value="<?php echo e(old('number', App\Models\AssetsType::getSequenceNo())); ?>" class="form-control" id="number">
        <?php if($errors->has('')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('number')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label for="name">اسم نوع الاصل<span class="text-danger">*</span></label>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name">
        <?php if($errors->has('name')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
            </span>
        <?php endif; ?>
    </div>

    <div class="form-group col-md-4">
        <label class="control-label">فئة الاصل</label>
        <select name="asset_class" class="form-control custom-select rounded-0" id="asset_class">
            <option value="الاثاث والتجهيزات" selected>الاثاث والتجهيزات</option>
            <option value="الالآت والمعدات">الالآت والمعدات</option>
            <option value="مباني الشركة">مباني الشركة</option>
        </select>
        <?php if($errors->has('asset_class')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('asset_class')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-2">
        <label for="quantity"> الكمية<span class="text-danger">*</span></label>
        <input type="text" name="quantity" value="<?php echo e(old('quantity')); ?>" class="form-control" id="quantity">
        <?php if($errors->has('quantity')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('quantity')); ?></small>
            </span>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js/admin/branch.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/assettype/manage.blade.php ENDPATH**/ ?>