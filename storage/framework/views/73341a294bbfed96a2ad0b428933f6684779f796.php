<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>
    <?php $__currentLoopData = $reserveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td><?php echo e($row->name); ?></td>
            <td>
                <a href="/admin/reservation/types/edit/<?php echo e($row->id); ?>"><i class="fas fa-edit" title="تعديل"></i></a>
                <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
                <a type="button" title="حذف"><i class="fas fa-trash DeleteBtn"></i></a>
                <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
                <input type="hidden" class="url-delet" value="<?php echo e($urls['delete']); ?><?php echo e($row->id); ?>">
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/reservation/type/manage.blade.php ENDPATH**/ ?>