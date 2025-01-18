@if (@isset($items) && !@empty($items) && count($items) > 0)
    @if ($items->count() > 0)
        @foreach ($items as $row)
            <div class="col-md-4 product simpleCart_shelfItem text-center">
                <a href="{{ route('show.item', $row->id) }}">
                    <span class="product-price">{{ '$' . $row->price }}</span>
                    <img src="{{ asset('images/items/'.$row->images->first()->image) }}" class="image" alt="" />
                </a>
                <div class="mask">
                    <a href="{{ route('show.item', $row->id) }}">{{ 'تفاصيل أكثر' }}</a>
                </div>
                <a class="product_name" href="{{ route('show.item', $row->id) }}">{{ $row->name }}</a>
                {{-- <p><span class="item_price">{{ '$' . $row->price }}</span></p> --}}
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
@else
    <div class="alert alert-danger col-md-12 mt-5">
        {{ 'لا توجد منتجات على بيانات البحث' }}
    </div>
@endif
