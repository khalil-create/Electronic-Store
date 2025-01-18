@php
    use App\Traits\userTrait;
    use Carbon\Carbon;
@endphp
{{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-gradient-yellow"> --}}
<nav class="main-header navbar navbar-expand navbar-default navbar-light bg-gradient-yellow">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-sm-inline-block">
            <a href="/home" class="nav-link"><i class="fas fa-home" title="{{ __('Home') }}"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/{{ request()->path() }}" class="nav-link"><i class="fas fa-refresh"
                    title="{{ __('Refresh') }}"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                @if ($user->image)
                    <img src="{{ asset('images/users/' . $user->image) }}" class="user-image img-circle elevation-2"
                        alt="User Image">
                @else
                    <img src="{{ asset('designImages/user.png') }}" class="user-image img-circle elevation-2"
                        alt="User Image">
                @endif
                <span class="d-none d-md-inline mr-2">{{ $user_name[0] }} </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    @if ($user->image)
                        <img src="{{ asset('images/users/' . $user->image) }}" class="img-circle elevation-2"
                            alt="User Image">
                    @else
                        <img src="{{ asset('designImages/user.png') }}" class="img-circle elevation-2" alt="User Image">
                    @endif
                    <p>
                        {{ $user_name[0] }} -
                        {{ $user->type == 1 ? 'أدمن' : 'مستخدم' }}
                        <small>{{ __('Date of addition') }}: {{ $user_date[0] }}</small>

                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('profile.index', $user->id) }}"
                        class="btn btn-default btn-flat float-left">{{ 'البروفايل' }}</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-default btn-flat float-right">
                        {{ 'تسجيل الخروج' }} <i class="fas fa-sign-out-alt"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                {{-- @if ($user->user->unreadnotifications->count())
                    <span
                        class="badge badge-warning navbar-badge">{{ $user->user->unreadnotifications->count() }}</span>
                @endif --}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    {{-- @if ($user->user->unreadnotifications->count())
                        {{ $user->user->unreadnotifications->count() }} اشعار
                    @else --}}
                    {{ __('There is no any notification') }}
                    {{-- @endif --}}
                </span>
                <div class="dropdown-divider"></div>
                {{-- @php $count = 0; @endphp
                @foreach ($user->user->unreadnotifications as $notify)
                    @if ($count >= 5)
                    @break
                @endif
                @php
                    $route = userTrait::getRouteReadNotification($notify->data['title']);
                    $since = userTrait::getSinceTimePast($notify->updated_at);
                    $userType = userTrait::getUserType();
                    $route = $userType . $route;
                    $count++;
                @endphp
                <a href="{{ route($route, ['id' => $notify->id]) }}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i>
                    {{ $notify->data['content'] }}
                    <p class="text-sm text-muted"><i class="far fa-clock mr-2"
                            style="margin-left: 10px"></i>{{ $since }}</p>
                </a>
            @endforeach --}}
                <div class="dropdown-divider"></div>
                {{-- @if ($user->user->unreadnotifications->count()) --}}
                <a href="/Notifications/showAllUnReadNotifications" class="dropdown-item dropdown-footer">
                    {{ __('See all notifications') }}</a>
                <a href="/Notifications/markAllNotifyAsRead" class="dropdown-item dropdown-footer">Mark all
                    notifications as read</a>
                {{-- @endif --}}
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt" title="{{ __('Expand') }}"></i>
            </a>
        </li>
        <li class="nav-item" style="margin-top: 7px">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i
                    class="fas fa-sign-out-alt" title="{{ __('logout') }}"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</nav>
