<div id="app">
    
    <nav class="navbar navbar-expand-md navbar-light bg-gradient-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <?php echo e($sys_variables->site_name); ?>

                <a href="/home" class="brand-link ml-3">
                    <img src="<?php echo e(asset('designImages/')); ?>/<?php echo e($sys_variables->image_logo ? $sys_variables->image_logo : 'logo.png'); ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
                </a>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <!-- Left navbar links -->
                <ul class="navbar-nav ml-auto float-left">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e('تسجيل الدخول'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e('انشاء حساب'); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown user-menu">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <?php if($user->image): ?>
                                    <img src="<?php echo e(asset('images/users/' . $user->image)); ?>"
                                        class="user-image img-circle elevation-2" alt="User Image">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('designImages/user.png')); ?>"
                                        class="user-image img-circle elevation-2" alt="User Image">
                                <?php endif; ?>
                                <span class="d-none d-md-inline"><?php echo e($user_name[0]); ?> </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <!-- User image -->
                                <li class="user-header bg-primary">
                                    <?php if($user->image): ?>
                                        <img src="<?php echo e(asset('images/users/' . $user->image)); ?>"
                                            class="img-circle elevation-2" alt="User Image">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('designImages/user.png')); ?>" class="img-circle elevation-2"
                                            alt="User Image">
                                    <?php endif; ?>
                                    <p>
                                        <?php echo e($user_name[0]); ?> -
                                        <?php echo e($user->type == 1 ? 'admin' : 'user'); ?>

                                        <small><?php echo e(__('Date of addition')); ?>: <?php echo e($user_date[0]); ?></small>

                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
                                    <a href="#" class="btn btn-default btn-flat"><?php echo e('البروفايل'); ?></a>
                                    <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <?php echo e('تسجيل الخروج'); ?>

                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                        style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->type == 1): ?>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">
                                        <b><?php echo e('لوحة التحكم'); ?></b>
                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto float-right">
                    <?php $__currentLoopData = App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('category.items', $cat->id)); ?>"><?php echo e($cat->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
<?php /**PATH E:\Laravel\E-Shop\project\resources\views/layouts/header.blade.php ENDPATH**/ ?>