<?php use App\Arrays\Lists; ?>

<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>
    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td>
                <?php $__currentLoopData = Lists::USER_TYPES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->type == $k): ?>
                        <?php echo e($v); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td><?php echo e($row->name); ?></td>
            <td><?php echo e($row->address); ?></td>
            <td><?php echo e($row->phone_number); ?></td>
            <td>
                
                <a href="#" title="تعديل"><i class="fas fa-edit EditBtn"></i></a>
                <input type="hidden" class="url-edit" value="<?php echo e($urls['edit']); ?><?php echo e($row->id); ?>">
                <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
                <input type="hidden" class="url-delet" value="<?php echo e($urls['delete']); ?><?php echo e($row->id); ?>">
                <a type="button"><i class="fas fa-trash DeleteBtn"></i></a>
                
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links-pagination'); ?>
    <?php echo $employees->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <div class="form-group col-md-12">
        <div class="khalil">
            <div class="card-header">
                <h3 class="card-title text-bold" style="float: right">المعلومات الشخصية</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="address">الاسم<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control"
                            id="name">
                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="address">رقم الهاتف</label>
                        <input id="phonenumber" value="<?php echo e(old('phone_number')); ?>" onkeyup="checkPhoneNumber()"
                            type="number" name="phone_number" class="form-control">
                        <small id="invalidPhoneNo" class="form-text text-danger" hidden></small>
                        <?php if($errors->has('phone_number')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('phone_number')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="address">العنوان</label>
                        <input type="text" name="address" value="<?php echo e(old('address')); ?>" class="form-control"
                            id="address">
                        <?php if($errors->has('address')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('address')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="control-label">الفرع<span class="text-danger">*</span></label>
        <select name="branch" class="form-control custom-select rounded-0" id="branch">
            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>" <?php echo e(old('branch') == $item->id ? 'selected' : ''); ?>>
                    <?php echo e($item->number); ?> <?php echo e(' - '); ?> <?php echo e($item->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('branch')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('branch')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label for="salary">الراتب</label>
        <input type="number" name="salary" value="<?php echo e(old('salary')); ?>" class="form-control" id="salary">
        <?php if($errors->has('salary')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('salary')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label for="identity_number" title="الرقم الوطني للبطاقة الشخصية">رقم الهوية</label>
        <input type="number" name="identity_number" value="<?php echo e(old('identity_number')); ?>" class="form-control"
            id="identity_number">
        <?php if($errors->has('identity_number')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('identity_number')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-6">
        <label for="identity_image">صورة الهوية</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="identity_image" value="<?php echo e(old('identity_image')); ?>" class="custom-file-input"
                    id="identity_image">
                <label class="custom-file-label" for="identity_image"></label>
                <?php if($errors->has('identity_image')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('identity_image')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="user_image">صورة الموظف</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="user_image" value="<?php echo e(old('user_image')); ?>" class="custom-file-input"
                    id="user_image">
                <label class="custom-file-label" for="user_image"></label>
                <?php if($errors->has('user_image')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('user_image')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js/admin/employee.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/employee/manage.blade.php ENDPATH**/ ?>