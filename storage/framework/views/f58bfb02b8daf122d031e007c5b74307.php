<div class="formPopup card card-default" id="popupForm">
    <div class="card-header">
        <h3 id="card-title-pop-form" class="card-title"><?php echo e($head_data['card-title-pop-form']); ?>

            <?php echo $__env->yieldContent('card-title'); ?>
        </h3>
        
        <div class="card-tools float-left">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" onclick="clearAllInputs()" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>

        </div>
    </div><!-- /.card-header -->
    <div class="card-body">
        
            <div class="col-md-12">
                <div>
                    <span class="text-danger">*</span>
                    <?php echo e(': الحقول المطلوبة'); ?>

                </div>
                <div class="form-group ScrollStyle">
                    
                    <form id="myform" name="myform" method="POST" action="<?php echo e(url($urls['store-form'])); ?>"
                        enctype="multipart/form-data" <?php echo $__env->yieldContent('form-attr'); ?>>
                        <?php echo e(csrf_field()); ?>

                        <div class="card-body border">
                            <div class="row">
                                <?php echo $__env->yieldContent('pop-form'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <button id="save" type="submit" class="btn btn-primary font">
                                    <i class="fas fa-save"></i> <?php echo e('حفظ'); ?>

                                </button>
                            </div>
                        </div><!-- /.card-body -->
                    </form><!-- /.form -->
                    
                </div><!-- /.form-group -->
            </div><!-- /.col -->
        
    </div><!-- /.card-body -->
</div><!-- /.formPopup -->
<?php /**PATH E:\Laravel\E-Shop\Electronic Store\resources\views/layouts/pop-form.blade.php ENDPATH**/ ?>