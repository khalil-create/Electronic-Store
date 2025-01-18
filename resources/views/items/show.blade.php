@extends('layouts.app')
@section('title')
    {{ __('تفاصيل المنتج') }}
@endsection

@section('content')
    @php
        $sys_variables = App\Models\SystemVariable::first();
        $i = 0;
    @endphp
    <div class="container text-right">
        <div class="products-page">
            <div class="products float-right">
                <div class="product-listy">
                    <h2>{{ 'منتجاتنا' }} </h2>
                    <ul class="product-list">
                        @foreach ($item->category->items as $row)
                            <li><a href="{{ route('show.item', $row->id) }}">{{ $row->name }}</a></li>
                            @php $i++; @endphp
                            @if ($i == 5) @break @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="new-product">
                <div class="col-md-5 zoom-grid float-right">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach ($item->images as $row)
                                <li data-thumb="{{ asset('images/items/') }}/{{ $row->image }}">
                                    <div class="thumb-image"> <img src="{{ asset('images/items/') }}/{{ $row->image }}"
                                            data-imagezoom="true" class="img-responsive" alt="" /> </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 dress-info">
                    <div class="dress-name">
                        <h3>{{ $item->name }}</h3>
                        <span>{{ '$' . $item->price }}</span>
                        <div class="clearfix"></div>
                        <p class="item-description">{{ $item->description }}</p>
                    </div>
                    <div class="span span1">
                        <p class="right">{{ 'الفئة: ' }}</p>
                        <p class="left">{{ $item->category->name }}</p>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <a href="https://wa.me//+967{{ $sys_variables->site_phone }}?text=مرحبا اريد الإستفسار عن هذا الجهاز: {{ $item->name }} "
                            target="_blank">
                            <svg width="20" height="20" viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"
                                fill-rule="evenodd" clip-rule="evenodd" class="karzoun-box-content-send-btn-icon">
                                <path
                                    d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522   c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982   c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537   c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938   c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537   c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333   c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882   c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977   c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344   c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223   C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z">
                                </path>
                            </svg>
                            <span class="karzoun-box-content-send-btn-text">{{ ' تواصل معنا: ' . $sys_variables->site_phone }}</span>
                        </a>
                    </div>
                    <div>
                        <a href="{{ 'tel:+967 '.$sys_variables->site_phone }}">
                            <i class="nav-icon fas fa-phone"></i>
                            <span class="karzoun-box-content-send-btn-text">{{ ' اتصل بنا: '. $sys_variables->site_phone }}</span>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <h2>{{ $item->comments->count() }} {{ 'التعليقات' }}</h2>
                @auth
                    <div class="form-group col-md-12 col-box">
                        <form method="POST" action="{{ route('comment.item', $item->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea name="content" placeholder="اكتب تعليقك هنا..." id="form" cols="30" rows="6"
                                        class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <small class="form-text text-danger">{{ $errors->first('content') }}</small>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">
                                        {{ 'ارسال' }} <i class="fas fa-solid fa-paper-plane fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="alert-danger col-md-12 col-box">
                        <span>
                            {{ 'للتعليق على المنتج يجب عليك تسجيل الدخول.' }}
                            <a href="{{ route('login') }}">{{ 'تسجيل الدخول' }}</a>
                        </span>
                    </div>
                @endauth
                @if ($item->comments->count())
                    @foreach ($item->comments as $row)
                        <div id="col-1" class="col-12 col-md-12 col-box">
                            <h5><a href="{{ route('profile.index', $row->user->id) }}">{{ $row->user->name }}</a></h5>
                            <p class="card-text">{{ $row->content }}</p>
                            <p>
                                <small class="text-muted">{{ $row->posted_at }}</small>
                                @auth
                                    @if ($row->user_id == Auth::user()->id)
                                        <input type="hidden" value="/comments/delete/{{ $row->id }}" class="url-delet">
                                        <a href="#" class="float-right ItemDeleteBtn" title="{{ __('delete comment') }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
                                @endauth
                            </p>
                        </div>
                    @endforeach
                @else
                    <div class="alert-danger col-md-12 col-box">
                        <span>
                            {{ 'لا توجد تعليقات' }}
                        </span>
                    </div>
                @endif
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js2/admin/items.js') }}"></script>
    <script src="{{ asset('js/imagezoom.js') }}"></script>
    <!-- FlexSlider -->
    <script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
@endsection
