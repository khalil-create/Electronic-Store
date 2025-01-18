<?php
    use App\Traits\userTrait;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="<?php echo e(asset('designImages/ab.jpg')); ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ادارة الفنادق</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if($user->user_image): ?>
                    <img src="<?php echo e(asset('images/users/' . $user->user_image)); ?>" class="img-circle elevation-2"
                        alt="User Image">
                <?php else: ?>
                    <img src="<?php echo e(asset('designImages/user.png')); ?>" class="img-circle elevation-2" alt="User Image">
                <?php endif; ?>
            </div>
            <div class="info">
                <a href="/user/profile/<?php echo e($user->id); ?>" class="d-block">
                    <?php echo e($user_name[0]); ?> <?php echo e($user_name[sizeof($user_name) - 1]); ?>

                    <br>
                    <p class="text-bold text-sm"> <?php echo e($user->type == 1 ? 'مستخدم' : ''); ?> </p>
                    
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="ابحث" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/home"
                        class="nav-link <?php echo e(request()->path() == 'home' || request()->path() == '/' ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            الصفحة الرئيسية
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('/admin/reservation/manage')); ?>"
                        class="nav-link <?php echo e(userTrait::printActive('active', 'reservation')); ?>">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            الحجوزات
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/user/sidebar.blade.php ENDPATH**/ ?>