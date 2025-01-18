@extends('layouts.app')
@section('title')
    {{ 'الصفحة الرئيسية' }}
@endsection
@section('content')
    @php
        $sys_variables = App\Models\SystemVariable::first();

        $currency = $sys_variables->currency;
        $cur_code = '$';
        if($currency == 2)
            $cur_code = 'ر.ي';
        elseif($currency == 3)
            $cur_code = 'ر.س';
    @endphp
    <div class="container">
        <div class="main-content">
            <div class="products-grid">
                <header>
                    <h3 class="head text-center">
                        @if (isset($category))
                            {{ $category->name }}
                        @else
                            {{ 'أحدث المنتجات' }}
                        @endif
                    </h3>
                </header>
                <form action="{{ route('home') }}" method="GET" class="d-flex" data-turbo="true" data-turbo-frame="items"
                    data-turbo-action="advance">
                    @csrf

                    <div class="col-md-12 mr-sm-3">
                        <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                        <input type="text" id="search" name="search" class="form-control"
                            placeholder="{{ 'ابحث هنا عن المنتج...' }}">
                        <input type="hidden" id="ajax_search_url" value="{{ route('items.ajax_search') }}">
                    </div>

                    {{-- <button type="submit" href="#" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button> --}}
                </form>
                <div id="ajax_responce_serarchDiv" class="row">
                    @if ($items->count() > 0)
                        @foreach ($items as $row)
                            <div class="col-md-4 product simpleCart_shelfItem text-center">
                                <a href="{{ route('show.item', $row->id) }}" class="image">
                                    <span class="product-price">{{ $cur_code . $row->price }}</span>
                                    <img src="{{ asset('images/items/'.$row->images->first()->image) }}" alt="" />
                                </a>
                                <div class="mask">
                                    <a href="{{ route('show.item', $row->id) }}">{{ 'تفاصيل أكثر' }}</a>
                                </div>
                                <a class="product_name" href="{{ route('show.item', $row->id) }}">{{ $row->name }}</a>

                                <div class="addToCart">
                                    {{-- <form action="{{ route('cart.add', $row->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-cart-plus"></i> {{ 'أضف إلى السلة' }}
                                        </button>
                                    </form> --}}
                                    <button class="addToCart1 btn btn-primary" data-item-id="{{ $row->id }}">
                                        <i class="fas fa-cart-plus"></i> {{ 'أضف إلى السلة' }}
                                    </button>
                                    <div class="addToCart2" style="display: none">
                                        <button class="btn btn-primary increaseBtn" data-item-id="{{ $row->id }}">+</button>
                                        {{-- <span class="countSpan">1</span> --}}
                                        <input type="number" value="1" class="count" style="width: 10%" readonly>
                                        <button class="btn btn-primary decreaseBtn" data-item-id="{{ $row->id }}">-</button>
                                    </div>
                                    {{-- <p><span class="item_price">{{ $cur_code . $row->price }}</span></p> --}}
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12 d-flex justify-content-center">
                            {{ $items->links() }}
                        </div>
                    @else
                        <div class="alert-danger col-md-12 col-box mt-5">
                            <span>
                                {{ 'لا توجد منتجات لهذه الفئة' }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="other-products">
        <div class="container">
            {{-- <h3 class="like text-center">Featured Collection</h3> --}}
            <ul id="flexiselDemo3">
                @foreach ($items as $item)
                    <li>
                        <a href="{{ route('show.item', $item->id) }}">
                            <img src="{{ asset('images/items/'.$item->images->first()->image) }}" class="img-responsive" alt="" />
                        </a>
                        <div class="product liked-product simpleCart_shelfItem">
                            <a class="like_name" href="{{ route('show.item', $item->id) }}">{{ $item->name }}</a>
                            <p><a class="item_add" href="#"><i></i> <span class="item_price">{{ $cur_code . $item->price }}</span></a></p>
                        </div>
                    </li>
                @endforeach
            </ul>
            <script type="text/javascript">
                $(window).load(function () {
                    $("#flexiselDemo3").flexisel({
                        visibleItems: 3,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint: 768,
                                visibleItems: 3
                            }
                        }
                    });

                });
            </script>
        </div>
    </div>
    <div class="container">
        <div class="online-strip">
            <div class="col-md-4 follow-us row">
                <h3>{{ 'تابعنا: ' }}
                    <a class="twitter" href="{{ $sys_variables->tweeter_url }}"></a>
                    <a class="facebook" href="{{ $sys_variables->facebook_url }}"></a>
                </h3>
            </div>
            <div class="col-md-4 shipping-grid">
                {{-- <div class="shipping">
                    <img src="images/shipping.png" alt="" />
                </div> --}}
                <div>
                    <h3>{{ 'عنواننا: ' }}</h3>
                    <p>{{ $sys_variables->address }}</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 online-order">
                <p>{{ 'اطلب اونلاين' }}</p>
                <h3>{{ 'تلفون: ' }}<a href="{{ 'tel:+967 '.$sys_variables->site_phone }}">{{ $sys_variables->site_phone }}</a></h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/jquery.flexisel.js') }}"></script>
    <script src="{{ asset('js2/admin/items.js') }}"></script>
@endsection
@section('script2')
    <script>
        $(document).ready(function() {
            // Load cart data on page load
            $.ajax({
                url: '{{ route("cart.data") }}',
                method: 'GET',
                success: function(response) {
                    updateAddToCartButtons(response.cart);
                    updateCartInfo(response.total, response.quantity);
                }
            });
            function updateCartInfo(total, quantity) {
                $('.simpleCart_total').text(total);
                $('.simpleCart_quantity').text(quantity);
            }
            function updateAddToCartButtons(cart) {
                $('.addToCart1').each(function() {
                    var itemId = $(this).data('item-id');
                    if (cart[itemId]) {
                        $(this).hide();
                        $(this).siblings('.addToCart2').show();
                        $(this).siblings('.addToCart2').find('.count').val(cart[itemId].quantity);
                    } else {
                        $(this).show();
                        $(this).siblings('.addToCart2').hide();
                    }
                });
            }
            $('.addToCart1').click(function(e) {
                e.preventDefault();
                console.log('addToCart1');
                // $(this).hide();
                // $(this).siblings('.addToCart2').show();


                var itemId = $(this).data('item-id');
                var button = $(this);

                $.ajax({
                    url: '{{ route("cart.add", ":id") }}'.replace(':id', itemId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        button.hide();
                        button.siblings('.addToCart2').show();
                        updateCartInfo(response.total, response.quantity);
                    }
                });
            });
            $('.increaseBtn').click(function(e) {
                console.log('increaseBtn');
                var itemId = $(this).data('item-id');
                var button = $(this);

                $.ajax({
                    url: '{{ route("cart.add", ":id") }}'.replace(':id', itemId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var countInput = button.siblings('.count');
                        var countValue = parseInt(countInput.val());
                        countInput.val(countValue + 1);
                        updateCartInfo(response.total, response.quantity);
                    }
                });

                // For Input
                // var countInput = $(this).closest("div").find('.count');
                // var countValue = countInput.val();
                // countInput.val(++countValue);
                // console.log('CountInput = ' + countValue);

                // For Span
                // var countSpan = $(this).closest("div").find('.countSpan');
                // var countSpanValue = countSpan.text();
                // countSpan.text(++countSpanValue);
                // console.log('Count Span = ' + countSpanValue);
            });
            $('.decreaseBtn').click(function(e) {
                console.log('decreaseBtn');
                var itemId = $(this).data('item-id');
                var button = $(this);

                $.ajax({
                    url: '{{ route("cart.remove", ":id") }}'.replace(':id', itemId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var countInput = button.siblings('.count');
                        var countValue = parseInt(countInput.val());
                        if (countValue > 1) {
                            countInput.val(countValue - 1);
                        } else {
                            button.parent('.addToCart2').hide();
                            button.parent().siblings('.addToCart1').show();
                        }
                        updateCartInfo(response.total, response.quantity);
                    }
                });

                // For Input
                // var countInput = $(this).closest("div").find('.count');
                // var countValue = countInput.val();
                // if (countValue > 1) {
                //     countInput.val(--countValue);
                //     console.log('CountInput = ' + countValue);
                // } else {
                //     $(this).parent('.addToCart2').hide();
                //     $(this).parent().siblings('.addToCart1').show();
                // }

                // For Span
                // var countSpan = $(this).closest("div").find('.countSpan');
                // var countSpanValue = countSpan.text();
                // if (countSpanValue > 1) {
                //     countSpan.text(--countSpanValue);
                //     console.log('Count Span = ' + countSpanValue);
                // } else {
                //     $(this).parent('.addToCart2').hide();
                //     $(this).parent().siblings('.addToCart1').show();
                // }
            });
            $('.simpleCart_empty').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route("cart.empty") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        updateCartInfo(response.total, response.quantity);
                    }
                });
            });
        });
    </script>
@endsection
