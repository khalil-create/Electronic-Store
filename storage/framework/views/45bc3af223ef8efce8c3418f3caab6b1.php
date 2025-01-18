<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>
    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td><?php echo e($row->name); ?></td>
            <td><?php echo e($row->code); ?></td>
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
    <?php echo $currencies->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <table id="mytable" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
        aria-describedby="example1_info">
        <thead style="background-color: #8eaab1;">
            <tr role="row">
                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">
                    اسم العملة
                </th>
                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">
                    كود العملة
                </th>
                <th style="width: 5%"></th>
            </tr>
        </thead>
        <tbody>
            <?php if($errors->count()): ?>
                <?php
                    $code = old('code');
                    $i = 0;
                ?>
                <?php $__currentLoopData = old('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="one">
                        <td class="form-group col-6">
                            <input type="text" value="<?php echo e($name); ?>" name="name[]" class="form-control"
                                required>
                            <?php if($errors->has('name.'.$i)): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('name.'.$i)); ?></small>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="form-group col-6">
                            <input type="text" value="<?php echo e($code[$i]); ?>" name="code[]" class="form-control"
                                required>
                            <?php if($errors->has('code.'.$i)): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('code.'.$i)); ?></small>
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
                        <input type="text" name="name[]" class="form-control" required>
                        
                    </td>
                    <td class="form-group col-6">
                        <input type="text" name="code[]" class="form-control"
                                required>
                        
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
        <?php echo e(method_field('PUT')); ?>

        <div class="form-group col-md-6">
            <label for="name">اسم العملة <span class="text-danger">*</span></label>
            <input type="text" name="name_cur" value="<?php echo e(old('name_cur')); ?>" class="form-control" id="name_cur">
            <?php if($errors->has('name_cur')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('name_cur')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label for="code">كود العملة<span class="text-danger">*</span></label>
            <input type="text" name="code_cur" value="<?php echo e(old('code_cur')); ?>" class="form-control" id="code_cur">
            <?php if($errors->has('code_cur')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('code_cur')); ?></small>
                </span>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js/admin/currency.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/currency/manage.blade.php ENDPATH**/ ?>