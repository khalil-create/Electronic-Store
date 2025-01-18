<?php $__env->startSection('form'); ?>
    <?php echo e(method_field('PUT')); ?>

    <div class="form-group col-md-12">
        <div class="khalil">
            <div class="card-header">
                <h3 class="card-title text-bold" style="float: right">المعلومات الشخصية</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="address">الاسم<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="<?php echo e(old('name', $employee->name)); ?>"
                            class="form-control">
                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="address">رقم الهاتف</label>
                        <input id="phonenumber" value="<?php echo e(old('phone_number', $employee->phone_number)); ?>"
                            onkeyup="checkPhoneNumber()" type="text" name="phone_number" class="form-control">
                        <small id="invalidPhoneNo" class="form-text text-danger" hidden></small>
                        <?php if($errors->has('phone_number')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('phone_number')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="address">العنوان</label>
                        <input type="text" name="address" value="<?php echo e(old('address', $employee->address)); ?>"
                            class="form-control" id="address">
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
        <select name="branch" class="form-control custom-select rounded-0">
            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"
                    <?php echo e(old('branch', $employee->branch_id) == $item->id ? 'selected' : ''); ?>>
                    <?php echo e($item->number); ?> <?php echo e(' - '); ?> <?php echo e($item->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('branch')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('branch')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label for="salary">الراتب</label>
        <input type="number" name="salary" value="<?php echo e(old('salary', $employee->salary)); ?>" class="form-control"
            id="salary">
        <?php if($errors->has('salary')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('salary')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label for="identity_number" title="الرقم الوطني للبطاقة الشخصية">رقم الهوية</label>
        <input type="number" name="identity_number" value="<?php echo e(old('identity_number', $employee->identity_number)); ?>"
            class="form-control" id="salary">
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
                <input type="file" value="<?php echo e(old('identity_image', $employee->identity_image)); ?>"
                    class="custom-file-input" name="identity_image">
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
                <input type="file" value="<?php echo e(old('user_image', $employee->user_image)); ?>" class="custom-file-input"
                    name="user_image">
                <label class="custom-file-label" for="user_image"></label>
                <?php if($errors->has('user_image')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('user_image')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group col-md-12">
        <div class="khalil">
            <div class="card-header">
                <h3 class="card-title" style="float: right">معلومات تسجيل الدخول <span class="text-danger">*</span></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <label class="control-label">نوع المستخدم</label>
                        <select name="type" class="form-control custom-select rounded-0">
                            <option value="1" selected>مستخدم عادي</option>
                            <option value="0">أدمن</option>
                        </select>
                        <?php if($errors->has('type')): ?>
                            <span class="help-block">
                                <small class="text-sm text-danger"><?php echo e($errors->first('type')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-4">
                        <label class="control-label">كلمة السر</label>
                        <input id="password" value="<?php echo e(old('password')); ?>" type="password" name="password"
                            class="form-control">
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('password')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-4">
                        <label class="control-label">تأكيد كلمة السر</label>
                        <input onkeyup="checkPassword()" value="<?php echo e(old('password_confirmation')); ?>"
                            id="password_confirmation" type="password" name="password_confirmation"
                            class="form-control">
                        <small class="form-text text-danger" id="inalidPasswordConfirmation"
                            hidden><?php echo e('ليست متطابقه'); ?></small>
                        <?php if($errors->has('password_confirmation')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('password_confirmation')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>