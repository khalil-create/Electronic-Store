@if (@isset($posts) && !@empty($posts) && count($posts) > 0)
    <h2>Latest Posts</h2>
    <div class="row">
        @foreach ($posts as $row)
            <div id="col-1" class="col-12 col-sm-6 col-md-3 col-box">
                <h3><a href="{{ route('show.post', $row->id) }}">{{ $row->title }}</a></h3>
                <p class="card-text">
                    <small class="text-muted">
                        <a href="{{ route('profile.index', $row->user_id) }}">{{ $row->user_name }}</a>
                    </small>
                </p>
                <p>
                    <small class="text-muted">{{ $row->posted_at }}</small><br>
                    <small class="text-muted">
                        <i class="fas fa-comment" name="comments" prefix="fa-regular"> {{ $row->comments_count }} </i>

                        @php $class_like = 'far'; @endphp
                        @auth
                            @php
                                $class_like =
                                    App\Models\Like::where('post_id', $row->id)
                                        ->where('user_id', Auth::user()->id)
                                        ->get()
                                        ->count() > 0
                                        ? 'fas'
                                        : 'far';
                            @endphp
                        @endauth
                        <a href="#" title="{{ __('like') }}"><i
                                class="{{ $class_like }} fa-heart LikeBtn"></i></a>
                        <input type="hidden" class="url-like" value="/posts/like/{{ $row->id }}">
                        <span>{{ $row->likes_count }}</span>
                    </small>
                    @auth
                        @if ($row->user_id == Auth::user()->id)
                            <a href="{{ route('edit.post', $row->id) }}" class="float-right ml-1"
                                title="{{ __('edit post') }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <input type="hidden" value="/posts/delete/{{ $row->id }}" class="url-delet">
                            <a href="#" class="float-right ItemDeleteBtn" title="{{ __('delete post') }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif
                    @endauth
                </p>
            </div>
        @endforeach
        <div class="col-md-12 d-flex justify-content-center" id="ajax_pagination_in_search">
            {{ $posts->links() }}
        </div>
    </div>
    {{-- <div class="col-md-12 justify-content-center" id="ajax_pagination_in_search">
        {{ $posts->links() }}
    </div> --}}
@else
    <div class="alert alert-danger">
        {{ __('There is no data found for search') }}
    </div>
@endif
