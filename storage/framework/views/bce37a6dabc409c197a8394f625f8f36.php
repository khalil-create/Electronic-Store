<?php $__env->startSection('title'); ?>
    <?php echo e('الصفحة الرئيسية'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?php echo e('الصفحة الرئيسية'); ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><?php echo e('الصفحة الرئيسية'); ?></a></li>
                            
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo e($users); ?></h3>
                                <p><?php echo e('المستخدمين'); ?></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="<?php echo e(route('users.index')); ?>" class="small-box-footer"><?php echo e('المزيد من المعلومات'); ?> <i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo e($items); ?></h3>
                                <p><?php echo e('المنتجات'); ?></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-file-text"></i>
                            </div>
                            <a href="<?php echo e(route('items.index')); ?>" class="small-box-footer"><?php echo e('المزيد من المعلومات'); ?> <i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    
                    <img src="<?php echo e(asset('designImages/logo2.png')); ?>"
                        style="align-content: center;height: 100%;width: 100%">
                    
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\E-Shop\project\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>