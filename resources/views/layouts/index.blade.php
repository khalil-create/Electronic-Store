<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('designImages/logo.png') }}">
    <title>
        @yield('title')
    </title>
    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    {{-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"> --}}
    <link rel="stylesheet" href="{{ asset('css2/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- My css -->
    <link href="{{ asset('css2/style.css') }}" rel="stylesheet" />
    @yield('css')
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Font Awesome Icons -->
    {{-- <link rel="stylesheet" href="{{ asset('css/all-canbedelete.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css2/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css2/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        .row .col-md-6 .flex-wrap {
            width: 100%;
        }

        .number {
            width: 10px;
        }

        /* .row .col-md-6 .dataTables_filter {
            float: left;
        } */

        .custom-file-label {
            /* padding-left: 4.5rem !important; */
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
            margin-right: 20px;
            margin-left: 10px;
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

<body class="hold-transition sidebar-mini layout-fixed text-right">
    <div class="wrapper">

        @php
            $user = Auth::user();
            $user_name = explode(' ', $user->name);
            $user_date = explode(' ', $user->created_at);

            $sys_variables = App\Models\SystemVariable::first();

            $currency = $sys_variables->currency;
            $cur_code = '$';
            if($currency == 2)
                $cur_code = 'ر.ي';
            elseif($currency == 3)
                $cur_code = 'ر.س';
        @endphp

        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- /.navbar -->

        <!-- Sidebar -->
        <!-- Main Sidebar Container -->
        @if ($user->type == 1)
            @include('admin.sidebar')
        @elseif($user->type == 2)
            @include('user.sidebar')
        @endif

        <!-- /.sidebar -->
        @yield('content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="height: 35.7252%; width: 20px;">
            <!-- Control sidebar content goes here -->
        </aside><!-- /.control-sidebar -->
        @include('layouts.footer')
    </div><!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- my javascript -->
    <script src="{{ asset('js2/my-js.js') }}"></script>
    <script src="{{ asset('js2/my-ajax.js') }}"></script>
    <script src="{{ asset('js2/sweetalert.min.js') }}"></script>
    <!-- my javascript -->

    <!-- Bootstrap 4 -->
    {{-- <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script> --}}
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    {{-- <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{asset('dist/js/pages/dashboard.js')}}"></script> --}}

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> --}}
    @include('sweetalert::alert')
    {{-- @auth('')
        <p>Welcome, Admin!</p>
    @else
        <p>Welcome, Guest!</p>
    @endauth --}}

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
        $(document).on('change', '.custom-file-input', function(event) {
            $(this).next('.custom-file-label').html(event.target.files[0].name);
        });
        document.getElementById('custom-file-label').textContent = 'أختر الملف';
    </script>
    @yield('script')
    @include('swal-msg')
</body>

</html>
