<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>
    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td><?php echo e($row->number); ?></td>
            <td><?php echo e($row->location->branch->number); ?>-<?php echo e($row->location->floor->number); ?>-<?php echo e($row->location->number); ?></td>
            <td>
                <?php if($row->account): ?>
                    <?php echo e($row->account->name); ?>(<?php echo e($row->account->account_number); ?>)
                <?php else: ?>
                    <p><?php echo e('------'); ?></p>
                <?php endif; ?>
            </td>
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
    <?php echo $rooms->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <table id="mytable" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
        aria-describedby="example1_info">
        <thead style="background-color: #8eaab1;">
            <tr role="row">
                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">
                    رقم الغرفة
                </th>
                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">
                    رقم الموقع
                </th>
                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">
                    إنشاء حساب
                </th>
                <th style="width: 5%"></th>
            </tr>
        </thead>
        <tbody>
            <?php if($errors->count()): ?>
                <?php
                    // $create_acc = old('create_acc');
                    $i = 0;
                    print_r($errors);
                ?>
                <?php $__currentLoopData = old('number'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="one">
                        <td class="form-group col-4">
                            <input type="number" value="<?php echo e($number); ?>" name="number[]" class="form-control"
                                required>
                            <?php if($errors->has('number.' . $i)): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('number.' . $i)); ?></small>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="form-group col-4">
                            <select name="location[]" class="form-control custom-select rounded-0">
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"
                                        <?php echo e(old('location')[$i] == $row->id ? 'selected' : ''); ?>>
                                        <?php echo e($row->number); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('location.' . $i)): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('location.' . $i)); ?></small>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="form-group col-4">
                            
                            <select name="create_acc[]" class="form-control custom-select rounded-0" id="create_acc">
                                <option value="">----- اختر خياراً -----</option>
                                <option value="1" selected>
                                    <?php echo e('نعم'); ?>

                                </option>
                                <option value="0" <?php echo e(old('create_acc')[$i] == 0 ? 'selected' : ''); ?>>
                                    <?php echo e('لا'); ?>

                                </option>
                            </select>
                            <?php if($errors->has('create_acc.' . $i)): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('create_acc.' . $i)); ?></small>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="#" onclick="deleteRow(this)">
                                <i class="nav-icon fas fa-trash" title="حذف"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr class="one">
                    <td class="form-group col-4">
                        <input type="number" value="<?php echo e(old('number')); ?>" name="number[]" class="form-control">
                        
                    </td>
                    <td class="form-group col-4">
                        <select name="location[]" class="form-control custom-select rounded-0">
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->id); ?>">
                                    <?php echo e($row->number); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td class="col-4">
                        
                        <select name="create_acc[]" class="form-control custom-select rounded-0" id="create_acc">
                            <option value="">----- اختر خياراً -----</option>
                            <option value="1" selected>
                                <?php echo e('نعم'); ?>

                            </option>
                            <option value="0">
                                <?php echo e('لا'); ?>

                            </option>
                        </select>
                        
                    </td>
                    <td>
                        <a href="#" onclick="deleteRow(this)">
                            <i class="nav-icon fas fa-trash" title="حذف"></i>
                        </a>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td onclick="addRow()" rowspan="1" colspan="2" class="btn" style="background-color: #8eaab1">
                    <i class="nav-icon fas fa-plus" title="اضافة"></i>
                </td>
            </tr>
        </tfoot>
    </table>
    <div id="pop-form-edit" hidden>
        <div class="form-group col-md-3">
            <label for="number">رقم الغرفة <span class="text-danger">*</span></label>
            <input type="number" name="room_no" value="<?php echo e(old('room_no')); ?>" class="form-control" id="room_no">
            <?php if($errors->has('room_no')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('room_no')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            <label for="location">رقم الموقع<span class="text-danger">*</span></label>
            <select name="location_id" class="form-control custom-select rounded-0" id="location_id">
                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" <?php echo e(old('location_id') == $row->id ? 'selected' : ''); ?>>
                        <?php echo e($row->number); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('location_id')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('location_id')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            <label for="location">لديه حساب</label>
            <select name="has_account" class="form-control custom-select rounded-0" id="has_account">
                <option value="">----- اختر خياراً -----</option>
                <option value="1" <?php echo e(old('has_account') == 1 ? 'selected' : ''); ?>>
                    <?php echo e('نعم'); ?>

                </option>
                <option value="0" <?php echo e(old('has_account') == 0 ? 'selected' : ''); ?>>
                    <?php echo e('لا'); ?>

                </option>
            </select>
        </div>
        <div class="form-group col-md-3" id="create-account-chkbox">
            <div class="icheck-primary">
                <input class="form-check-input" type="checkbox" name="create_account" id="create_account" <?php echo e(old('create_account') ? 'checked' : ''); ?>>
                <label class="form-check-label" for="create_account">
                    <?php echo e(__('انشئ حساب')); ?>

                </label>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js/admin/room.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/room/manage.blade.php ENDPATH**/ ?>