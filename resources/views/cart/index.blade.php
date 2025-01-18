@extends('layouts.app')

@section('content')
<div class="container">
    <h1>سلة التسوق</h1>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>المنتج</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>الإجمالي</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $itemId => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>{{ $item['price'] * $item['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $itemId) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">إزالة</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @php
            $sys_variables = App\Models\SystemVariable::first();
        @endphp
        <button id="whatsappButton" class="btn btn-success" data-whatsapp="+967{{ $sys_variables->site_phone }}">
            <i class="fab fa-whatsapp"></i> إرسال عبر واتساب
        </button>
    @else
        <p>السلة فارغة.</p>
    @endif
</div>

<script>
    document.getElementById('whatsappButton').addEventListener('click', function() {
        var cart = @json($cart);
        var message = 'تفاصيل السلة:\n\n';
        var total = 0;

        for (var itemId in cart) {
            if (cart.hasOwnProperty(itemId)) {
                var item = cart[itemId];
                message += 'المنتج: ' + item.name + '\n';
                message += 'الكمية: ' + item.quantity + '\n';
                message += 'السعر: ' + item.price + '\n';
                message += 'الإجمالي: ' + (item.price * item.quantity) + '\n\n';
                total += item.price * item.quantity;
            }
        }

        message += 'المجموع الكلي: ' + total + '\n';

        var phoneNumber = this.getAttribute('data-whatsapp');
        var whatsappUrl = 'https://wa.me/' + phoneNumber + '?text=' + encodeURIComponent(message);
        window.open(whatsappUrl, '_blank');
    });
</script>
@endsection
