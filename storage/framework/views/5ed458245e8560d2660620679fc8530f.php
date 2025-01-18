<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>System Variables</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $systemVariables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $systemVariable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($systemVariable->name); ?></td>
                        <td><?php echo e($systemVariable->value); ?></td>
                        <td>
                            <a href="<?php echo e(route('system-variables.edit', $systemVariable->id)); ?>" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('system-variables.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/system-variables/index.blade.php ENDPATH**/ ?>