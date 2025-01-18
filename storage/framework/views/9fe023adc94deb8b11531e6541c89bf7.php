<?php use Carbon\Carbon; ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('designImages/logo.png')); ?>">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- My css -->
</head>

<body>
    <?php if(auth()->guard()->check()): ?>
        <?php
            $user = Auth::user();
            $user_name = explode(' ', $user->name);
            $user_date = explode(' ', $user->created_at);
        ?>
    <?php endif; ?>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e('BlogTeck'); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->type == 1): ?>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">
                                        <?php echo e(__('Admin Panel')); ?>

                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    <?php endif; ?>

                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
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
                                        <a href="<?php echo e(route('profile.index', $user->id)); ?>"
                                            class="btn btn-default btn-flat float-left"><?php echo e(__('Profile')); ?></a>
                                        <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat float-right"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <?php echo e(__('logout')); ?>

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

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="my-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
    <footer class="main-footer" style="margin-left: 5px;">
        <span style="font-weight: bold">
            Copyright © <?php echo e(date('Y', strtotime(Carbon::now()))); ?> <a href="#">Khalil Al-Umaisi</a>. All rights
            reserved.
        </span>
    </footer>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('swal-msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- jQuery -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo e(asset('plugins/select2/js/select2.full.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
    <script>
        $(document).on('change', '.custom-file-input', function(event) {
            $(this).next('.custom-file-label').html(event.target.files[0].name);
        });
        $(function() {
            //Initialize Select2 Elements
            // $('.select2').select2()

            // //Initialize Select2 Elements
            // $('.select2bs4').select2({
            //     theme: 'bootstrap4'
            // })
        });
    </script>

    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH E:\Laravel\Free Host On 000webhost\Blog\resources\views/layouts/app.blade.php ENDPATH**/ ?>