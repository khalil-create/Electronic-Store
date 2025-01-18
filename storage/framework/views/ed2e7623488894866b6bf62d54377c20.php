<?php $__env->startSection('form'); ?>
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
            <?php if(old('number')): ?>
                <?php
                    $branch = old('branch');
                    $i = 0;
                ?>
                <?php $__currentLoopData = old('number'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="one">
                        <td class="form-group col-6">
                            <input type="number" value="<?php echo e($number); ?>" name="number[]" class="form-control" required>
                            <?php if($errors->has('number.*')): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('number.*')); ?></small>
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
                            <?php if($errors->has('branch.*')): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('branch.*')); ?></small>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/floor/add.blade.php ENDPATH**/ ?>