<div id="app">
    <!-- header-section-starts -->
    <div class="header">
        <div class="header-top-strip">
            <div class="container">
                <div class="header-right">
                    <div class="cart box_1">
                        <a href="{{ route('cart.show') }}">
                            <h3>
                                <span class="simpleCart_total"> $0.00 </span>
                                (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)
                                <img src="images/bag.png" alt="">
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- header-section-ends -->
    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> --}}
    {{-- <nav class="navbar navbar-expand-md navbar-light bg-gradient-light shadow-sm"> --}}
    <nav class="navbar navbar-expand-md navbar-default navbar-light bg-gradient-yellow shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ $sys_variables->site_name }}
                <a href="/home" class="brand-link ml-3">
                    <img src="{{ asset('designImages/') }}/{{ $sys_variables->image_logo ? $sys_variables->image_logo : 'logo.png' }}" class="brand-image img-circle elevation-3" style="opacity: .8">
                </a>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- @auth
                    @if (Auth::user()->type == 1)
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    <b>{{ 'لوحة التحكم' }}</b>
                                </a>
                            </li>
                        </ul>
                    @endif
                @endauth --}}
                <!-- Left navbar links -->
                <ul class="navbar-nav ml-auto float-left">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ 'تسجيل الدخول' }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ 'انشاء حساب' }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown user-menu">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                @if ($user->image)
                                    <img src="{{ asset('images/users/' . $user->image) }}"
                                        class="user-image img-circle elevation-2" alt="User Image">
                                @else
                                    <img src="{{ asset('designImages/user.png') }}"
                                        class="user-image img-circle elevation-2" alt="User Image">
                                @endif
                                <span class="d-none d-md-inline mr-2">{{ $user_name[0] }} </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <!-- User image -->
                                <li class="user-header bg-primary">
                                    @if ($user->image)
                                        <img src="{{ asset('images/users/' . $user->image) }}"
                                            class="img-circle elevation-2" alt="User Image">
                                    @else
                                        <img src="{{ asset('designImages/user.png') }}" class="img-circle elevation-2"
                                            alt="User Image">
                                    @endif
                                    <p>
                                        {{ $user_name[0] }} -
                                        {{ $user->type == 1 ? 'admin' : 'user' }}
                                        <small>{{ __('Date of addition') }}: {{ $user_date[0] }}</small>

                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    {{-- <a href="{{ route('profile.index', $user->id) }}" class="btn btn-default btn-flat">{{ 'البروفايل' }}</a> --}}
                                    <a href="#" class="btn btn-default btn-flat">{{ 'البروفايل' }}</a>
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ 'تسجيل الخروج' }}
                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest

                    @auth
                        @if (Auth::user()->type == 1)
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                        <b>{{ 'لوحة التحكم' }}</b>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    @endauth
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto float-right">
                    @foreach (App\Models\Category::all() as $cat)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.items', $cat->id) }}">{{ $cat->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</div>
