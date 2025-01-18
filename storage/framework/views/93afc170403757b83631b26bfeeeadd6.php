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
            <a href="/home" class="nav-link"><i class="fas fa-home" title="الصفحة الرئيسية"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/<?php echo e(request()->path()); ?>" class="nav-link"><i class="fas fa-refresh" title="تحديث"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                
                <?php if($user->user_image): ?>
                    <img src="<?php echo e(asset('images/users/' . $user->user_image)); ?>"
                        class="user-image img-circle elevation-2" alt="User Image">
                <?php else: ?>
                    <img src="<?php echo e(asset('designImages/user.png')); ?>" class="user-image img-circle elevation-2"
                        alt="User Image">
                <?php endif; ?>
                <span class="d-none d-md-inline"><?php echo e($user_name[0]); ?> <?php echo e($user_name[sizeof($user_name) - 1]); ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <?php if($user->user_image): ?>
                        <img src="<?php echo e(asset('images/users/' . $user->user_image)); ?>" class="img-circle elevation-2"
                            alt="User Image">
                    <?php else: ?>
                        <img src="<?php echo e(asset('designImages/user.png')); ?>" class="img-circle elevation-2" alt="User Image">
                    <?php endif; ?>
                    <p>
                        <?php echo e($user_name[0]); ?> <?php echo e($user_name[sizeof($user_name) - 1]); ?> -
                        <?php echo e($user->type == 0 ? 'admin' : 'user'); ?>

                        <small>تأريخ الإضافة <?php echo e($user_date[0]); ?></small>

                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="/<?php echo e($user->type == 0 ? 'admin' : 'user'); ?>/profile/<?php echo e($user->id); ?>"
                        class="btn btn-default btn-flat">Profile</a>
                    <a href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
                        class="btn btn-default btn-flat float-left"><i class="fas fa-sign-out-alt"></i> تسجيل
                        الخروج</a>
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
                <?php if($user->user->unreadnotifications->count()): ?>
                    <span
                        class="badge badge-warning navbar-badge"><?php echo e($user->user->unreadnotifications->count()); ?></span>
                <?php endif; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    <?php if($user->user->unreadnotifications->count()): ?>
                        <?php echo e($user->user->unreadnotifications->count()); ?> اشعار
                    <?php else: ?>
                        لايوجد لديك اي اشعار
                    <?php endif; ?>
                </span>
                <div class="dropdown-divider"></div>
                <?php $count = 0; ?>
                <?php $__currentLoopData = $user->user->unreadnotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($count >= 5): ?>
                    <?php break; ?>
                <?php endif; ?>
                <?php
                    $route = userTrait::getRouteReadNotification($notify->data['title']);
                    $since = userTrait::getSinceTimePast($notify->updated_at);
                    $userType = userTrait::getUserType();
                    $route = $userType . $route;
                    $count++;
                ?>
                <a href="<?php echo e(route($route, ['id' => $notify->id])); ?>" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i>
                    
                    <?php echo e($notify->data['content']); ?>

                    <p class="text-sm text-muted"><i class="far fa-clock mr-2"
                            style="margin-left: 10px"></i><?php echo e($since); ?></p>
                    
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="dropdown-divider"></div>
            <?php if($user->user->unreadnotifications->count()): ?>
                <a href="/Notifications/showAllUnReadNotifications" class="dropdown-item dropdown-footer">رؤية كل
                    الاشعارات</a>
                <a href="/Notifications/markAllNotifyAsRead" class="dropdown-item dropdown-footer">Mark all
                    notifications as read</a>
            <?php endif; ?>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt" title="توسيع"></i>
        </a>
    </li>
    <li class="nav-item" style="margin-top: 7px">
        <a href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i
                class="fas fa-sign-out-alt" title="تسجيل الخروج"></i></a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form>
    </li>
</ul>
</nav>
<?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/Layouts/navbar.blade.php ENDPATH**/ ?>