<?php use App\Arrays\Lists; ?>

<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td>
                <?php $__currentLoopData = Lists::USER_TYPES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->type == $k): ?>
                        <?php echo e($v); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            
            <td><a href="<?php echo e(route('profile.index', $row->id)); ?>" title="<?php echo e(__('Profile')); ?>"><?php echo e($row->name); ?></a></td>
            <td><?php echo e($row->email); ?></td>
            <td>
                <a href="<?php echo e(route('user.followers', $row->id)); ?>" title="<?php echo e(__('followers')); ?>"><?php echo e($row->followers->count()); ?></a>
            </td>
            <td>
                <?php $__currentLoopData = Lists::USER_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->status == $key): ?>
                        
                        <a href="#" title="<?php echo e($key == 1 ? __('deactivate') : __('activate')); ?>">
                            <b class="text-<?php echo e($key == 1 ? 'success' : 'danger'); ?> activateBtn"><?php echo e($value); ?></b>
                        </a>
                        <input type="hidden" class="url-activate" value="<?php echo e($urls['activate']); ?><?php echo e($row->id); ?>">
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
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
    <?php echo $users->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <div class="form-group col-md-4">
        <label for="address"><?php echo e(__('Name')); ?><span class="text-danger">*</span></label>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control <?php $__errorArgs = ['name'];
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
        <label for="image"><?php echo e(__('Image')); ?></label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" value="<?php echo e(old('image')); ?>" class="custom-file-input" name="image" id="image">
                <label class="custom-file-label" for="image"></label>
                <?php if($errors->has('image')): ?>
                    <span class="help-block">
                        <small class="form-text text-danger"><?php echo e($errors->first('image')); ?></small>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="control-label"><?php echo e(__('Status')); ?><span class="text-danger">*</span></label>
        <select name="status" class="form-control custom-select rounded-0" id="status">
            <?php $__currentLoopData = Lists::USER_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k); ?>" <?php echo e(old('status') == $k ? 'selected' : ''); ?>><?php echo e($v); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('status')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('status')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-12">
        <div class="khalil">
            <div class="card-header">
                <h3 class="card-title"><?php echo e(__('Login Information')); ?> <span class="text-danger">*</span></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="control-label"><?php echo e(__('User Type')); ?></label>
                        <select name="type" class="form-control custom-select rounded-0" id="type">
                            <?php $__currentLoopData = Lists::USER_TYPES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($k); ?>" <?php echo e(old('type', 2) == $k ? 'selected' : ''); ?>>
                                    <?php echo e($v); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('type')): ?>
                            <span class="help-block">
                                <small class="text-sm text-danger"><?php echo e($errors->first('type')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email"><?php echo e(__('Email')); ?></label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="email">
                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('email')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label"><?php echo e(__('Password')); ?></label>
                        <input id="password" type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('password')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label"><?php echo e(__('Password Confirmation')); ?></label>
                        <input onkeyup="checkPassword()" id="password_confirmation" type="password"
                            name="password_confirmation" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <small class="form-text text-danger" id="inalidPasswordConfirmation"
                            hidden><?php echo e(__('Not Matched')); ?></small>
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

<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js/admin/users.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Blogs Projects\project\resources\views/admin/users/index.blade.php ENDPATH**/ ?>