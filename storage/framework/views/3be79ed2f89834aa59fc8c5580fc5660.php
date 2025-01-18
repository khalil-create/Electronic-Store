<?php use App\Arrays\Lists; ?>


<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            
            <td><?php echo e($row->name); ?></td>
            <td><?php echo e($row->description); ?></td>
            <td>
                <a href="#" title="<?php echo e(__('edit')); ?>" class="btn btn-primary btn-sm"><i
                        class="fas fa-edit EditBtn"></i></a>
                <input type="hidden" class="url-edit" value="<?php echo e($urls['edit']); ?><?php echo e($row->id); ?>">
                <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
                <a href="#" title="<?php echo e(__('delete')); ?>" class="btn btn-outline-danger btn-sm"><i
                        class="fas fa-trash DeleteBtn"></i></a>
                <input type="hidden" class="url-delet" value="<?php echo e($urls['delete']); ?><?php echo e($row->id); ?>">
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links-pagination'); ?>
    <?php echo $categories->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <div class="form-group col-md-12">
        <label for="name"><?php echo e('اسم الفئة'); ?><span class="text-danger">*</span></label>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>"
            class="form-control <?php $__errorArgs = ['email'];
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
    <div class="form-group col-md-12">
        <label><?php echo e('الوصف'); ?><span class="text-danger">*</span></label>
        <textarea name="description" id="description" cols="30" rows="6" placeholder="الوصف..."
            class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('description')); ?></textarea>
        <?php if($errors->has('description')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('description')); ?></small>
            </span>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js2/admin/categories.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\E-Shop\project\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>