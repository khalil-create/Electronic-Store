<?php
    use App\Traits\userTrait;
    use Carbon\Carbon;
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/home" class="nav-link"><i class="fas fa-home" title="<?php echo e(__('Home')); ?>"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/<?php echo e(request()->path()); ?>" class="nav-link"><i class="fas fa-refresh" title="<?php echo e(__('Refresh')); ?>"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <?php if($user->image): ?>
                    <img src="<?php echo e(asset('images/users/' . $user->image)); ?>"
                        class="user-image img-circle elevation-2" alt="User Image">
                <?php else: ?>
                    <img src="<?php echo e(asset('designImages/user.png')); ?>" class="user-image img-circle elevation-2"
                        alt="User Image">
                <?php endif; ?>
                <span class="d-none d-md-inline"><?php echo e($user_name[0]); ?> </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <?php if($user->image): ?>
                        <img src="<?php echo e(asset('images/users/' . $user->image)); ?>" class="img-circle elevation-2"
                            alt="User Image">
                    <?php else: ?>
                        <img src="<?php echo e(asset('designImages/user.png')); ?>" class="img-circle elevation-2" alt="User Image">
                    <?php endif; ?>
                    <p>
                        <?php echo e($user_name[0]); ?> -
                        <?php echo e($user->type == 1 ? 'admin' : 'user'); ?>

                        <small><?php echo e(__('Date of addition')); ?>: <?php echo e($user_date[0]); ?></small>

                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="<?php echo e(route('profile.index', $user->id)); ?>"
                        class="btn btn-default btn-flat float-left"><?php echo e(__('Profile')); ?></a>
                    <a href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-default btn-flat float-right">
                        <?php echo e(__('logout')); ?>  <i class="fas fa-sign-out-alt"></i></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </li>
            </ul>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    
                    <?php echo e(__('There is no any notification')); ?>

                    
                </span>
                <div class="dropdown-divider"></div>
                
                <div class="dropdown-divider"></div>
                
                <a href="/Notifications/showAllUnReadNotifications" class="dropdown-item dropdown-footer">
                    <?php echo e(__('See all notifications')); ?></a>
                <a href="/Notifications/markAllNotifyAsRead" class="dropdown-item dropdown-footer">Mark all
                    notifications as read</a>
                
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt" title="<?php echo e(__('Expand')); ?>"></i>
            </a>
        </li>
        <li class="nav-item" style="margin-top: 7px">
            <a href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i
                    class="fas fa-sign-out-alt" title="<?php echo e(__('logout')); ?>"></i></a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </li>
    </ul>
</nav>
<?php /**PATH E:\Laravel\Free Host On 000webhost\Blog\Blog\resources\views/Layouts/navbar.blade.php ENDPATH**/ ?>