<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Edit System Variable</h2>
        <form method="POST" action="<?php echo e(route('system-variables.update', $systemVariable->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="value">Value:</label>
                <input type="text" class="form-control" id="value" name="value" value="<?php echo e($systemVariable->value); ?>"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('system-variables.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/system-variables/edit.blade.php ENDPATH**/ ?>