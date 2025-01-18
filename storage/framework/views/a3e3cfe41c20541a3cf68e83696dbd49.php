<?php $__env->startSection('title'); ?>
    <?php echo e(__('Profile')); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>البروفايل</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="/profile/index/<?php echo e(Auth::user()->id); ?>">البروفايل الشخصي</a>
                            </li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title" style="float: right">بروفايلي</span>
                        <div class="card-tools float-left">
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
                            <div class="col-md-6">
                                <!-- Profile Image -->
                                <div class="card card-widget widget-user">
                                    <div class="widget-user-header bg-info">
                                        <h3 class="widget-user-username"><?php echo e($user->name); ?></h3>
                                        <h5 class="widget-user-desc">
                                            <?php echo e($user->type == 1 ? 'أدمن' : 'عميل'); ?>

                                        </h5>
                                    </div>
                                    <div class="widget-user-image text-center">
                                        <img class="img-circle elevation-2 "
                                            <?php if(Auth::user()->user_image): ?>
                                                src="<?php echo e(asset('images/users/' . $user->image)); ?>"
                                            <?php else: ?>
                                                src="<?php echo e(asset('designImages/user.png')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="card-footer">
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>التعليقات</b> <a
                                                    class="float-left"><?php echo e($user->comments->count()); ?></a>
                                            </li>
                                            
                                        </ul>
                                        
                                    </div><!-- /.card-footer -->
                                </div><!-- /.card -->
                            </div>
                            <div class="col-md-6">
                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">About Me</h3>
                                    </div> <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> مكان وتأريخ الميلاد</strong>
                                        <p class="text-muted">
                                            kkkkkkkkkkkkkkkkk
                                        </p>

                                        <hr>
                                        <strong><i class="fas fa-male mr-1"></i> الجنس</strong>
                                        <p class="text-muted">kkkkkkkkkkkkkk</p>

                                        <hr>
                                        <strong><i class="fas fa-pencil-alt mr-1"></i> البريد الالكتروني</strong>
                                        <p class="text-muted"><?php echo e($user->email); ?></p>

                                        <hr>
                                        <strong><i class="fas fa-pencil-alt mr-1"></i> رقم الهاتف</strong>
                                        <p class="text-muted"><?php echo e($user->phone_no); ?></p>
                                    </div><!-- /.card-body -->
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
    </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/admin/posts.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\E-Shop\project\resources\views/profile/index.blade.php ENDPATH**/ ?>