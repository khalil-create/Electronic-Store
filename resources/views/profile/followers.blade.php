@extends('layouts.app')
@section('title')
    {{ __('Profile') }}
@endsection
@section('content')
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-box">
                    <a href="{{ route('profile.index', $user->id) }}" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                    </a>
                    <div class="text-center mb-2">
                        <div class="image">
                            @if ($user->image)
                                <img src="{{ asset('images/users/' . $user->image) }}"
                                    class="img-circle elevation-2 profile-img" alt="User Image">
                            @else
                                <img src="{{ asset('designImages/user.png') }}" class="img-circle elevation-2"
                                    alt="User Image">
                            @endif
                        </div>
                        <h2 class="mb-0">{{ $user->name }}</h2>
                        <small class="card-subtitle mb-2 text-muted">{{ $user->email }}</small>

                        @if ($user->id != auth()->id())
                            {{-- <a href="{{ route('add.post') }}" class="btn btn-primary" title="{{ __('Add Post') }}">
                                <i class="fas fa-plus-circle"></i> {{ __('Follow') }}
                            </a>
                            <a href="{{ route('add.post') }}" class="btn btn-secondary" title="{{ __('Add Post') }}">
                                <i class="fas fa-check-circle"></i> {{ __('Following') }}
                            </a> --}}
                            <!-- Follow button -->
                            @if (!auth()->user()->followedUsers->contains("user_id", $user->id))
                                <form action="{{ route('users.follow', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" title="{{ __('Follow ').$user->name }}">
                                        <i class="fas fa-plus-circle"></i> {{ __('Follow') }}
                                    </button>
                                    {{-- <a href="{{ route('users.follow', $user->id) }}" class="btn btn-primary" title="{{ __('Follow ').$user->name }}">
                                        <i class="fas fa-plus-circle"></i> {{ __('Follow') }}
                                    </a> --}}
                                </form>
                            @else
                                <!-- Unfollow button -->
                                <form action="{{ route('users.unfollow', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary" title="{{ __('Unfollow ').$user->name }}">
                                        <i class="fas fa-check-circle"></i> {{ __('Following') }}
                                    </button>
                                    {{-- <a href="{{ route('users.unfollow', $user->id) }}" class="btn btn-secondary" title="{{ __('Unfollow ').$user->name }}">
                                        <i class="fas fa-check-circle"></i> {{ __('Following') }}
                                    </a> --}}
                                </form>
                            @endif
                        @endif

                        <div class="card-text row mt-3">
                            <div class="col-md-3">
                                <span class="text-muted d-block">{{ __('Followers') }}</span>
                                {{ $user->followers->count() }}
                            </div>
                            <div class="col-md-3">
                                <span class="text-muted d-block">{{ __('Comments') }}</span>
                                {{ $user->comments->count() }}
                            </div>

                            <div class="col-md-3">
                                <span class="text-muted d-block">{{ __('Posts') }}</span>
                                {{ $user->posts->count() }}
                            </div>

                            <div class="col-md-3">
                                <span class="text-muted d-block">{{ __('Likes') }}</span>
                                {{ $user->likes->count() }}
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header">
                                <h3>{{ __('Followers') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <div class="col-md-12"> --}}
                                    @if ($user->followers->count())
                                        @foreach ($user->followers as $row)
                                            <div class="row">
                                                <div class="btn btn-default">
                                                    <a href="{{ route('profile.index', $row->follower->id) }}">
                                                        <div class="image">
                                                            @if ($row->follower->image)
                                                                <img src="{{ asset('images/users/' . $row->follower->image) }}"
                                                                    class="img-circle elevation-2 profile-img2" alt="User Image">
                                                            @else
                                                                <img src="{{ asset('designImages/user.png') }}" class="img-circle elevation-2 profile-img2"
                                                                    alt="User Image">
                                                            @endif
                                                            <strong class="ml-3 d-none d-md-inline">{{ $row->follower->name }} </strong>
                                                            {{-- <h3><a href="{{ route('profile.index', $row->follower->id) }}">{{ $row->follower->name }}</a></h3> --}}
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="custom-hr">
                                        @endforeach
                                    @else
                                        <div class="alert-danger col-md-12 col-box">
                                            <span>{{ __('There is no any follower') }}</span>
                                        </div>
                                    @endif
                                {{-- </div><!-- /.col --> --}}
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/admin/posts.js') }}"></script>
@endsection
