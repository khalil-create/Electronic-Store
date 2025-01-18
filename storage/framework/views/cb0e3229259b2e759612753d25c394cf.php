<?php
    use App\Traits\userTrait;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="<?php echo e(asset('designImages/logo.png')); ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo e(__('BlogTeck')); ?></span>
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
                    <p class="text-bold text-sm"> <?php echo e($user->type == 1 ? __('Admin') : ''); ?> </p>
                    
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
                    <a href="/admin/dashboard"
                        class="nav-link <?php echo e(request()->path() == 'admin/dashboard' ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            <?php echo e(__('Dashboard')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('user.index')); ?>"
                        class="nav-link <?php echo e(userTrait::printActive('active', 'users')); ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            <?php echo e(__('Users')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('post.index')); ?>"
                        class="nav-link <?php echo e(userTrait::printActive('active', 'posts')); ?>">
                        <i class="nav-icon fas fa-file-text"></i>
                        <p>
                            <?php echo e(__('Posts')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('comment.index')); ?>"
                        class="nav-link <?php echo e(userTrait::printActive('active', 'comments')); ?>">
                        <i class="nav-icon far fa-comment"></i>
                        <p>
                            <?php echo e(__('Comments')); ?>

                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH E:\Laravel\Free Host On 000webhost\Blog\Blog\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>