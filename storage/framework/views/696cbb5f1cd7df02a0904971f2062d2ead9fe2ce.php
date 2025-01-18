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
                <?php $username = explode(' ', Auth::user()->user_name_third); ?>
                <?php if(Auth::user()->user_image): ?>
                    <img src="<?php echo e(asset('images/users/' . Auth::user()->user_image)); ?>" class="img-circle elevation-2"
                        alt="User Image">
                <?php else: ?>
                    <img src="<?php echo e(asset('designImages/user.png')); ?>" class="img-circle elevation-2" alt="User Image">
                <?php endif; ?>
            </div>
            <div class="info">
                <a href="/admin/profile/<?php echo e(Auth::user()->id); ?>" class="d-block">
                    <?php echo e($username[0]); ?> <?php echo e(Auth::user()->user_surname); ?>

                    <br>
                    <p class="text-bold text-sm"> <?php echo e(Auth::user()->user_type); ?> </p>
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
                    <a href="/home" class="nav-link <?php echo e(request()->path() == 'home' ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            الصفحة الرئيسية
                        </p>
                    </a>
                </li>
                <?php
                    // $p = request()->path();
                    // $index = 4;
                    // $profile = substr($p, 0, 7);
                    // if ($p != 'home' && $p != 'not-allowed' && $profile != 'profile') {
                    //     $index = strpos($p, '/', 6);
                    // }
                    // $path = substr($p, 0, $index);
                    //////////////////////////////////
                    // $path = request()->path();
                    // $p = explode('/', $path);
                    // if (isset($p[1])) {
                    //     $path = $p[1];
                    // }
                    // echo $p[1];
                    // $paths = ['branch', 'floor', 'room', 'emp', 'user'];
                    // $clas = userTrait::printActive('menu-open', $path);
                    // echo $clas . ' kkkkkkkkkkkkkkkk';
                ?>
                
                <li class="nav-item <?php echo e(userTrait::printMenuOpen('menu-open', 2)); ?>">
                    <a href="#" class="nav-link <?php echo e(userTrait::printMenuOpen('active', 2)); ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            تهيئة النظام
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/branch/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'branch')); ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>الفروع</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/user/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'user')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>المستخدمين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/emp/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'emp')); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الموظفين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/floor/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'floor')); ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>الادوار</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/room/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'room')); ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>الغرف</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/reservation/types/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'types', 2)); ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>انواع الحجز</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>