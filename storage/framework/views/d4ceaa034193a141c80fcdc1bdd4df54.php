<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>سلة التسوق</h1>
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(count($cart) > 0): ?>
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
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemId => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item['name']); ?></td>
                        <td><?php echo e($item['quantity']); ?></td>
                        <td><?php echo e($item['price']); ?></td>
                        <td><?php echo e($item['price'] * $item['quantity']); ?></td>
                        <td>
                            <form action="<?php echo e(route('cart.remove', $itemId)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger btn-sm">إزالة</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php
            $sys_variables = App\Models\SystemVariable::first();
        ?>
        <button id="whatsappButton" class="btn btn-success" data-whatsapp="+967<?php echo e($sys_variables->site_phone); ?>">
            <i class="fab fa-whatsapp"></i> إرسال عبر واتساب
        </button>
    <?php else: ?>
        <p>السلة فارغة.</p>
    <?php endif; ?>
</div>

<script>
    document.getElementById('whatsappButton').addEventListener('click', function() {
        var cart = <?php echo json_encode($cart, 15, 512) ?>;
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\E-Shop\Electronic Store\resources\views/cart/index.blade.php ENDPATH**/ ?>