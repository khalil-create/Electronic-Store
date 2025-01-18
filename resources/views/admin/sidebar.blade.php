@php
    use App\Traits\userTrait;
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="{{ asset('designImages/') }}/{{ $sys_variables->image_logo ? $sys_variables->image_logo : 'logo.png' }}" class="brand-image img-circle elevation-3 float-right" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $sys_variables->site_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if ($user->image)
                    <img src="{{ asset('images/users/' . $user->image) }}" class="img-circle elevation-2"
                        alt="User Image">
                @else
                    <img src="{{ asset('designImages/user.png') }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="/profile/index/{{ $user->id }}" class="d-block">
                    {{ $user_name[0] }}
                    <br>
                    <p class="text-bold text-sm"> {{ $user->type == 1 ? 'أدمن' : 'مستخدم' }} </p>
                    {{-- <p class="text-bold text-sm"> {{ $user->type == 0 ? 'أدمن' : '' }} </p> --}}
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
        <nav class="mt-2 text-right">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/admin/dashboard"
                        class="nav-link {{ request()->path() == 'admin/dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{ 'الصفحة الرئيسية' }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ userTrait::printActive('active', 'users') }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ 'المستخدمين' }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ userTrait::printActive('active', 'categories') }}">
                        <i class="nav-icon fas fa-file-text"></i>
                        <p>
                            {{ 'الفئات' }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('items.index') }}"
                        class="nav-link {{ userTrait::printActive('active', 'items') }}">
                        <i class="nav-icon fas fa-file-text"></i>
                        <p>
                            {{ 'المنتجات' }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/system-variables/index') }}"
                        class="nav-link {{ userTrait::printActive('active', 'system-variables') }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            {{ 'متغيرات النظام' }}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
