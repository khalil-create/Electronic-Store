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
    <link rel="stylesheet" href="<?php echo e(asset('css2/adminlte.min.css')); ?>">
    <!-- Styles -->
    <link href="<?php echo e(asset('css2/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css2/app.css')); ?>" rel="stylesheet">
    <!-- My css -->




    
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <!-- Custom Theme files -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--webfont-->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-3.1.1.min.js')); ?>"></script>
    <!-- //for bootstrap working -->
    <!-- cart -->
    <script src="<?php echo e(asset('js/simpleCart.min.js')); ?>">
    </script>
    <!-- cart -->
    <link rel="stylesheet" href="<?php echo e(asset('css/flexslider.css')); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo e(asset('css2/bootstrap-rtl.min.css')); ?>">
    <?php echo $__env->yieldContent('script'); ?>
</head>

<body class="text-right">
    <?php
        $sys_variables = App\Models\SystemVariable::first();
    ?>
    <?php if(auth()->guard()->check()): ?>
        <?php
            $user = Auth::user();
            $user_name = explode(' ', $user->name);
            $user_date = explode(' ', $user->created_at);
        ?>
    <?php endif; ?>
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="my-wrapper bg-white">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('js2/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js2/my-js.js')); ?>"></script>
    

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('swal-msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- jQuery -->
    
    <!-- Select2 -->
    <script src="<?php echo e(asset('plugins/select2/js/select2.full.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
    <script>
        $(document).on('change', '.custom-file-input', function(event) {
            $(this).next('.custom-file-label').html(event.target.files[0].name);
        });
        document.getElementById('custom-file-label').textContent = 'أختر الملف';
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


    <script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
    <!--webfont-->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-3.1.1.min.js')); ?>"></script>
    <!-- //for bootstrap working -->
    <!-- cart -->
    <script src="<?php echo e(asset('js/simpleCart.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/responsive-tabs.js')); ?>"></script>
    <script type="text/javascript">
      $( '#myTab a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      $( '#moreTabs a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>
    <?php echo $__env->yieldContent('script2'); ?>
</body>

</html>
<?php /**PATH E:\Laravel\E-Shop\Electronic Store\resources\views/layouts/app.blade.php ENDPATH**/ ?>