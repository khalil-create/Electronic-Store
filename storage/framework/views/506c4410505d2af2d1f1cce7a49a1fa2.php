<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>
    <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td><?php echo e($row->number); ?></td>
            <td><?php echo e($row->branch->number); ?> <?php echo e('-'); ?> <?php echo e($row->branch->name); ?></td>
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
    <?php echo $floors->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <table id="mytable" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
        aria-describedby="example1_info">
        <thead style="background-color: #8eaab1;">
            <tr role="row">
                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">
                    رقم الدور
                </th>
                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">
                    رقم الفرع
                </th>
                <th style="width: 5%"></th>
            </tr>
        </thead>
        <tbody>
            <?php if($errors->count()): ?>
                <?php
                    $branch = old('branch');
                    $i = 0;
                ?>
                <?php $__currentLoopData = old('number'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="one">
                        <td class="form-group col-6">
                            <input type="number" value="<?php echo e($number); ?>" name="number[]" class="form-control"
                                required>
                            <?php if($errors->has('number.'.$i)): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('number.'.$i)); ?></small>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="form-group col-6">
                            <select name="branch[]" class="form-control custom-select rounded-0">
                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>" <?php echo e($branch[$i] == $row->id ? 'selected' : ''); ?>>
                                        <?php echo e($row->number); ?> <?php echo e('-'); ?> <?php echo e($row->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('branch.'.$i)): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('branch.'.$i)); ?></small>
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
                    <td class="form-group col-6">
                        <input type="number" name="number[]" class="form-control" required>
                        
                    </td>
                    <td class="form-group col-6">
                        <select name="branch[]" class="form-control custom-select rounded-0">
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->id); ?>">
                                    <?php echo e($row->number); ?> <?php echo e('-'); ?> <?php echo e($row->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <div class="form-group col-md-6">
            <label for="number">رقم الدور <span class="text-danger">*</span></label>
            <input type="number" name="floor_no" value="<?php echo e(old('floor_no')); ?>" class="form-control" id="floor_no">
            <?php if($errors->has('floor_no')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('floor_no')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label for="branch">رقم الفرع<span class="text-danger">*</span></label>
            <select name="branch_no" class="form-control custom-select rounded-0" id="branch_no">
                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" <?php echo e(old('branch') == $row->id ? 'selected' : ''); ?>>
                        <?php echo e($row->number); ?> <?php echo e('-'); ?> <?php echo e($row->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('branch_no')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('branch_no')); ?></small>
                </span>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js/admin/floor.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/floor/manage.blade.php ENDPATH**/ ?>