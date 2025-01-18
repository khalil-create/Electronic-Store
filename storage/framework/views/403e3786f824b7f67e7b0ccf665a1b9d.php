<?php
    use App\Traits\userTrait;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="<?php echo e(asset('designImages/')); ?>/<?php echo e($sys_variables->image_logo ? $sys_variables->image_logo : 'logo.png'); ?>" class="brand-image img-circle elevation-3 float-right" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo e($sys_variables->site_name); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if($user->image): ?>
                    <img src="<?php echo e(asset('images/users/' . $user->image)); ?>" class="img-circle elevation-2"
                        alt="User Image">
                <?php else: ?>
                    <img src="<?php echo e(asset('designImages/user.png')); ?>" class="img-circle elevation-2" alt="User Image">
                <?php endif; ?>
            </div>
            <div class="info">
                <a href="/profile/index/<?php echo e($user->id); ?>" class="d-block">
                    <?php echo e($user_name[0]); ?>

                    <br>
                    <p class="text-bold text-sm"> <?php echo e($user->type == 1 ? 'أدمن' : 'مستخدم'); ?> </p>
                    
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
        <nav class="mt-2 text-right">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/admin/dashboard"
                        class="nav-link <?php echo e(request()->path() == 'admin/dashboard' ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            <?php echo e('الصفحة الرئيسية'); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('users.index')); ?>"
                        class="nav-link <?php echo e(userTrait::printActive('active', 'users')); ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            <?php echo e('المستخدمين'); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('categories.index')); ?>"
                        class="nav-link <?php echo e(userTrait::printActive('active', 'categories')); ?>">
                        <i class="nav-icon fas fa-file-text"></i>
                        <p>
                            <?php echo e('الفئات'); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('items.index')); ?>"
                        class="nav-link <?php echo e(userTrait::printActive('active', 'items')); ?>">
                        <i class="nav-icon fas fa-file-text"></i>
                        <p>
                            <?php echo e('المنتجات'); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('/admin/system-variables/index')); ?>"
                        class="nav-link <?php echo e(userTrait::printActive('active', 'system-variables')); ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            <?php echo e('متغيرات النظام'); ?>

                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH E:\Laravel\E-Shop\Electronic Store\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>