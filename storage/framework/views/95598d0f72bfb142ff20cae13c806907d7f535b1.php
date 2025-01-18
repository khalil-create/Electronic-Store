<?php $__env->startSection('form'); ?>
    <table id="mytable" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
        aria-describedby="example1_info">
        <thead style="background-color: #8eaab1;">
            <tr role="row">
                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">
                    اسم النوع
                </th>
                <th style="width: 5%"></th>
            </tr>
        </thead>
        <tbody>
            <tr class="one">
                <td class="form-group">
                    <input type="text" value="<?php echo e(old('name')); ?>" name="name[]" class="form-control">
                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                            <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                        </span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="#" onclick="deleteRow(this)">
                        <i class="nav-icon fas fa-trash" title="حذف"></i>
                    </a>
                </td>
            </tr>
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

<?php echo $__env->make('layouts.base-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/reservation/type/add.blade.php ENDPATH**/ ?>