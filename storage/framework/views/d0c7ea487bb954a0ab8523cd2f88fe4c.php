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
                <a href="/admin/profile/<?php echo e($user->id); ?>" class="d-block">
                    <?php echo e($user_name[0]); ?> <?php echo e($user_name[sizeof($user_name) - 1]); ?>

                    <br>
                    <p class="text-bold text-sm"> <?php echo e($user->type == 0 ? 'أدمن' : ''); ?> </p>
                    
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
                
                <li class="nav-item <?php echo e(userTrait::printMenuOpen('menu-open', 'init')); ?>">
                    <a href="#" class="nav-link <?php echo e(userTrait::printMenuOpen('active', 'init')); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            تهيئة النظام
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/admin/system-variables/index')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'system-variables')); ?>">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    متغيرات النظام
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/currency/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'currency')); ?>">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>العملات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/reserve-types/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'reserve-types')); ?>">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>انواع الحجز</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/assettype/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'assettype')); ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p> انواع الاصول</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php echo e(userTrait::printMenuOpen('menu-open', 'input')); ?>">
                    <a href="#" class="nav-link <?php echo e(userTrait::printMenuOpen('active', 'input')); ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            مدخلات النظام
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/branch/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'branch')); ?>">
                                <i class="nav-icon fas fa-code-branch"></i>
                                <p>الفروع</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/user/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'user')); ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>المستخدمين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/emp/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'emp')); ?>">
                                <i class="nav-icon fas fa-users"></i>
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
                            <a href="<?php echo e(url('admin/location/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'location')); ?>">
                                <i class="nav-icon fas fa-location-arrow"></i>
                                <p>المواقع</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/room/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'room')); ?>">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>الغرف</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item <?php echo e(userTrait::printMenuOpen('menu-open', 'system operations')); ?>">
                    <a href="#" class="nav-link <?php echo e(userTrait::printMenuOpen('active', 'system operations')); ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            عمليات النظام
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/admin/reservation/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'reservation')); ?>">
                                <i class="nav-icon far fa-calendar"></i>
                                <p>
                                    الحجوزات
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/admin/account/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'account')); ?>">
                                <i class="nav-icon fas fa-hotel"></i>
                                <p>
                                    ادارة الحسابات
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/admin/account-transactions/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'account-transactions')); ?>">
                                <i class="nav-icon fas fa-hotel"></i>
                                <p>
                                    العمليات المالية
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/admin/maintenance/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'maintenance')); ?>">
                                <i class="nav-icon far fa-calendar"></i>
                                <p>
                                    طلبات صيانة الاصول
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/asset/manage')); ?>"
                                class="nav-link <?php echo e(userTrait::printActive('active', 'asset')); ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>إثبات اصل</p>
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