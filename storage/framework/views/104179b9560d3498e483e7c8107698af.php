<?php if(@isset($items) && !@empty($items) && count($items) > 0): ?>
    <?php if($items->count() > 0): ?>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 product simpleCart_shelfItem text-center">
                <a href="<?php echo e(route('show.item', $row->id)); ?>">
                    <span class="product-price"><?php echo e('$' . $row->price); ?></span>
                    <img src="<?php echo e(asset('images/items/'.$row->images->first()->image)); ?>" alt="" />
                </a>
                <div class="mask">
                    <a href="<?php echo e(route('show.item', $row->id)); ?>"><?php echo e('تفاصيل أكثر'); ?></a>
                </div>
                <a class="product_name" href="<?php echo e(route('show.item', $row->id)); ?>"><?php echo e($row->name); ?></a>
                
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-12 d-flex justify-content-center">
            <?php echo e($items->links()); ?>

        </div>
        <?php else: ?>
        <div class="alert-danger col-md-12 col-box mt-5">
            <span>
                <?php echo e('لا توجد منتجات لهذه الفئة'); ?>

            </span>
        </div>
    <?php endif; ?>
<?php else: ?>
    <div class="alert alert-danger col-md-12 mt-5">
        <?php echo e('لا توجد منتجات على بيانات البحث'); ?>

    </div>
<?php endif; ?>
<?php /**PATH E:\Laravel\E-Shop\project\resources\views/items/ajax_search.blade.php ENDPATH**/ ?>