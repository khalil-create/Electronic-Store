<?php $__env->startSection('title'); ?>
    <?php echo e($head_data['head']); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <?php echo e($head_data['head']); ?>

                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e($urls['head-link']); ?>"><?php echo e($head_data['head']); ?></a></li>
                            <?php if(isset($head_data['head3'])): ?>
                                <?php if($urls['head-link2'] != null): ?>
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo e($urls['head-link2']); ?>"><?php echo e($head_data['head3']); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <li class="breadcrumb-item active"><?php echo e($head_data['head2']); ?></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->
        <section class="content">
            <div class="container-fluid" style="min-height: 410px">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default" style="margin-left: 20px;">
                    <div class="card-header">
                        <h3 class="card-title" style="float: right"><?php echo e($head_data['card-title']); ?> <?php echo $__env->yieldContent('card-title'); ?></h3>
                        <div class="card-tools float-right">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <form id="myform" name="myform" method="POST"
                                        action="<?php echo e(url($urls['store-form'])); ?>" enctype="multipart/form-data"
                                        <?php echo $__env->yieldContent('form-attr'); ?>>
                                        <?php echo e(csrf_field()); ?>

                                        <div class="card-body border">
                                            <?php echo $__env->yieldContent('form'); ?>
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary font">
                                                    حفظ<i class="fas fa-save"></i>
                                                </button>
                                            </div>
                                        </div><!-- /.card-body -->
                                    </form><!-- /.form -->
                                </div><!-- /.form-group -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/layouts/base-form.blade.php ENDPATH**/ ?>