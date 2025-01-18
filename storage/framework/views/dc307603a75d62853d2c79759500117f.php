<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('designImages/log.jpg')); ?>">
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
    <!-- Google Font: Source Sans Pro -->
    
    
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- My css -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" />
    <?php echo $__env->yieldContent('css'); ?>
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/jqvmap/jqvmap.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- iCheck -->
    
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.min.css')); ?>">
    <!-- Font Awesome Icons -->
    
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
    <style>
        .row .col-md-6 .flex-wrap {
            width: 100%;
        }

        .number {
            width: 10px;
        }

        .row .col-md-6 .dataTables_filter {
            float: left;
        }

        .custom-file-label {
            padding-right: 4.5rem !important;
        }

        .card-footer {
            text-align: center;
        }

        .formPopup {
            display: none;
            position: fixed;
            top: 0;
            /* bottom: 5%; */
            /* max-width: 78%; */
            margin-left: 35px;
            /* margin-left: 30%; */
            min-width: 50%;
            border: 3px solid #999999;
            border-radius: 10px;
            z-index: 1035;
        }

        .demo {
            overflow: auto;
            border: 1px solid silver;
            min-height: 100px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" style="text-align: right;align-content: right; font-size: <?php echo e(App\Arrays\Lists::FONTSIZES[App\Models\SystemVariable::first()->font_size]); ?>;">

        <?php
            $user = Auth::user()->employee;
            $user_name = explode(' ', $user->name);
            $user_date = explode(' ', $user->created_at);
        ?>

        <!-- Navbar -->
        <?php echo $__env->make('Layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /.navbar -->

        <!-- Sidebar -->
        <!-- Main Sidebar Container -->
        <?php if($user->type == 0): ?>
            <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($user->type == 1): ?>
            <?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <!-- /.sidebar -->
        <?php echo $__env->yieldContent('content'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="height: 35.7252%; width: 20px;">
            <!-- Control sidebar content goes here -->
        </aside><!-- /.control-sidebar -->
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div><!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- my javascript -->
    <script src="<?php echo e(asset('js/my-js.js')); ?>"></script>
    <script src="<?php echo e(asset('js/my-ajax.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
    <!-- my javascript -->
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    
    <!-- ChartJS -->
    <script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo e(asset('plugins/sparklines/sparkline.js')); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo e(asset('plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo e(asset('plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <!-- Summernote -->
    
    <!-- overlayScrollbars -->
    <script src="<?php echo e(asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    

    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/pdfmake/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
    
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                paging: false,
                "info": false,
                // scrollY: 300,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        // console.log($('#example1_info').parent('div').parent('div'));
        // $('#example1_info').parent('div').parent('div').attr('hidden');
    </script>
    <script>
        // $(document).on('change', '.custom-file-input', function(event) {
        //     $(this).next('.custom-file-label').html(event.target.files[0].name);
        // });
        // document.getElementById('custom-file-label').textContent = 'أختر الملف';
    </script>
    <?php echo $__env->yieldContent('script'); ?>
    <?php echo $__env->make('swal-msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/layouts/index.blade.php ENDPATH**/ ?>