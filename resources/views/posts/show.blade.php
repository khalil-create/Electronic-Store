@extends('layouts.app')
@section('title')
    {{ __('Show post') }}
@endsection

@section('content')
    <div class="container">
        <section class="content">
            <div class="card-body">
                <div class="col-12 col-sm-6 col-md-12 col-box">
                    <h2>{{ $post->title }}</h2>
                    <p class="card-text mb-3">
                        <small class="text-muted">
                            <a href="{{ route('profile.index', $post->user->id) }}">{{ $post->user->name }}</a>,
                            <small class="text-muted">{{ $post->posted_at }}</small>
                        </small>
                    </p>
                    <p class="item-description">{{ $post->content }}</p>
                    <p>
                        @foreach (explode(',', $post->tags) as $tag)
                            <a href="#">#{{ $tag }}</a>
                        @endforeach
                    </p>
                    @php $class_like = 'far'; @endphp
                    @auth
                        @php
                            $class_like =
                                App\Models\Like::where('post_id', $post->id)
                                    ->where('user_id', Auth::user()->id)
                                    ->get()
                                    ->count() > 0
                                    ? 'fas'
                                    : 'far';
                        @endphp
                    @endauth
                    <p>
                    <p class="text-muted">
                        <a href="#" title="{{ __('like') }}"><i
                                class="{{ $class_like }} fa-heart LikeBtn"></i></a>
                        <input type="hidden" class="url-like" value="/posts/like/{{ $post->id }}">
                        <span>{{ $post->likes->count() }}</span>
                    </p>
                    </p>
                </div>
                <h2>{{ $post->comments->count() }} {{ __('comments') }}</h2>
                @auth
                    <div class="form-group col-md-12 col-box">
                        <form method="POST" action="{{ route('comment.post', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea name="content" placeholder="your comment" id="form" cols="30" rows="6"
                                        class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <small class="form-text text-danger">{{ $errors->first('content') }}</small>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">
                                        {{ __('Comment') }} <i class="fas fa-solid fa-paper-plane fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="alert-danger col-md-12 col-box">
                        <span>
                            {{ __('You must be signed in to comment.') }}
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </span>
                    </div>
                @endauth
                @foreach ($post->comments as $row)
                    <div id="col-1" class="col-12 col-sm-6 col-md-12 col-box">
                        <h5><a href="{{ route('profile.index', $row->user->id) }}">{{ $row->user->name }}</a></h5>
                        <p class="card-text">{{ $row->content }}</p>
                        <p>
                            <small class="text-muted">{{ $row->posted_at }}</small>
                            @auth
                                @if ($row->user_id == Auth::user()->id)
                                    {{-- <a href="{{ route('edit.comment', $row->id) }}" class="float-right ml-1" title="{{ __('edit comment') }}">
                                        <i class="fas fa-edit"></i>
                                    </a> --}}
                                    <input type="hidden" value="/comments/delete/{{ $row->id }}" class="url-delet">
                                    <a href="#" class="float-right ItemDeleteBtn" title="{{ __('delete comment') }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endif
                            @endauth
                        </p>
                    </div>
                @endforeach
            </div><!-- /.card-body -->
        </section>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/admin/posts.js') }}"></script>
@endsection
