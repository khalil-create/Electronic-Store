<?php use App\Arrays\Lists; ?>

<?php $__env->startSection('tbody'); ?>
    <?php
        $sys_variables = App\Models\SystemVariable::first();

        $currency = $sys_variables->currency;
        $cur_code = '$';
        if($currency == 2)
            $cur_code = 'ر.ي';
        elseif($currency == 3)
            $cur_code = 'ر.س';

        $i = 1;
    ?>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            
            <td><a href="<?php echo e(route('show.item', $row->id)); ?>" title="<?php echo e('عرض المنتج'); ?>"><?php echo e($row->name); ?></a></td>
            
            <td><?php echo e($row->description); ?></td>
            <td><?php echo e($cur_code . $row->price); ?></td>
            <td><?php echo e($row->category->name); ?></td>
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
    <?php echo $items->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <div class="form-group col-md-4">
        <label for="name"><?php echo e('اسم المنتج'); ?><span class="text-danger">*</span></label>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control <?php $__errorArgs = ['email'];
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
    <div class="form-group col-md-4">
        <label class="control-label"><?php echo e('الفئة'); ?><span class="text-danger">*</span></label>
        <select name="category_id" value="<?php echo e(old('category_id')); ?>" class="form-control select2 <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="category_id">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('category_id')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('category_id')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label for="price"><?php echo e('السعر'); ?><span class="text-danger">* <?php echo e('(' . Lists::CURRENCIES[$currency] . ')'); ?></span></label>
        <input type="text" name="price" value="<?php echo e(old('price')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="price">
        <?php if($errors->has('price')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('price')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-12">
        <div class="khalil">
            <div class="card-header">
                <h3 class="card-title"><?php echo e('صور المنتج'); ?> <span class="text-danger">*</span></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="image1"><?php echo e('الصورة 1'); ?></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="<?php echo e(old('image1')); ?>" class="custom-file-input <?php $__errorArgs = ['image1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image1" id="image1">
                                <label class="custom-file-label" for="image1"></label>
                                <?php if($errors->has('image1')): ?>
                                    <span class="help-block">
                                        <small class="form-text text-danger"><?php echo e($errors->first('image1')); ?></small>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="image2"><?php echo e('الصورة 2'); ?></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="<?php echo e(old('image2')); ?>" class="custom-file-input <?php $__errorArgs = ['image2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image2" id="image2">
                                <label class="custom-file-label" for="image2"></label>
                                <?php if($errors->has('image2')): ?>
                                    <span class="help-block">
                                        <small class="form-text text-danger"><?php echo e($errors->first('image2')); ?></small>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="image3"><?php echo e('الصورة 3'); ?></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="<?php echo e(old('image3')); ?>" class="custom-file-input <?php $__errorArgs = ['image3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image3" id="image3">
                                <label class="custom-file-label" for="image3"></label>
                                <?php if($errors->has('image3')): ?>
                                    <span class="help-block">
                                        <small class="form-text text-danger"><?php echo e($errors->first('image3')); ?></small>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="model_no"><?php echo e('رقم المودل'); ?><span class="text-danger">*</span></label>
        <input type="text" name="model_no" value="<?php echo e(old('model_no')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="model_no">
        <?php if($errors->has('model_no')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('model_no')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-8">
        <label><?php echo e('الوصف'); ?><span class="text-danger">*</span></label>
        <textarea name="description" id="description" cols="30" rows="6" placeholder="الوصف..." class="form-control <?php $__errorArgs = ['description'];
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
    <script src="<?php echo e(asset('js2/admin/items.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\E-Shop\Electronic Store\resources\views/admin/items/index.blade.php ENDPATH**/ ?>