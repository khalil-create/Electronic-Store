@php use Carbon\Carbon; @endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('designImages/logo.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css2/adminlte.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css2/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css2/app.css') }}" rel="stylesheet">
    <!-- My css -->




    {{-- <title>@yield('title')</title> --}}
    <link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Custom Theme files -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
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
    <script type="text/javascript" src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>
    <!-- //for bootstrap working -->
    <!-- cart -->
    <script src="{{ asset('js/simpleCart.min.js') }}">
    </script>
    <!-- cart -->
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css2/bootstrap-rtl.min.css') }}">
    @yield('script')
</head>

<body class="text-right">
    @php
        $sys_variables = App\Models\SystemVariable::first();
    @endphp
    @auth
        @php
            $user = Auth::user();
            $user_name = explode(' ', $user->name);
            $user_date = explode(' ', $user->created_at);
        @endphp
    @endauth
    @include('layouts.header')
    <div class="my-wrapper bg-white">
        @yield('content')
    </div>

    @include('layouts.footer')

    <script src="{{ asset('js2/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js2/my-js.js') }}"></script>
    {{-- <footer class="main-footer" style="margin-left: 5px;">
        <span style="font-weight: bold">
            Copyright © {{ date('Y', strtotime(Carbon::now())) }} <a href="#">Khalil Al-Umaisi</a>. All rights
            reserved.
        </span>
    </footer> --}}

    @include('sweetalert::alert')
    @include('swal-msg')
    <!-- jQuery -->
    {{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
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
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @include('sweetalert::alert')
    @yield('script')


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
    <script type="text/javascript" src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>
    <!-- //for bootstrap working -->
    <!-- cart -->
    <script src="{{ asset('js/simpleCart.min.js') }}"></script>

    <script src="{{ asset('js/responsive-tabs.js') }}"></script>
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
    @yield('script2')
</body>

</html>
