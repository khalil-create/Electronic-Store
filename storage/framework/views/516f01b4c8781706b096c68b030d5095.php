<?php $__env->startSection('title'); ?>
    <?php echo e('الصفحة الرئيسية'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $sys_variables = App\Models\SystemVariable::first();

        $currency = $sys_variables->currency;
        $cur_code = '$';
        if($currency == 2)
            $cur_code = 'ر.ي';
        elseif($currency == 3)
            $cur_code = 'ر.س';
    ?>
    <div class="container">
        <div class="main-content">
            <div class="products-grid">
                <header>
                    <h3 class="head text-center">
                        <?php if(isset($category)): ?>
                            <?php echo e($category->name); ?>

                        <?php else: ?>
                            <?php echo e('أحدث المنتجات'); ?>

                        <?php endif; ?>
                    </h3>
                </header>
                <form action="<?php echo e(route('home')); ?>" method="GET" class="d-flex" data-turbo="true" data-turbo-frame="items"
                    data-turbo-action="advance">
                    <?php echo csrf_field(); ?>

                    <div class="col-md-12 mr-sm-3">
                        <input type="hidden" id="token_search" value="<?php echo e(csrf_token()); ?>">
                        <input type="text" id="search" name="search" class="form-control"
                            placeholder="<?php echo e('ابحث هنا عن المنتج...'); ?>">
                        <input type="hidden" id="ajax_search_url" value="<?php echo e(route('items.ajax_search')); ?>">
                    </div>

                    
                </form>
                <div id="ajax_responce_serarchDiv" class="row">
                    <?php if($items->count() > 0): ?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 product simpleCart_shelfItem text-center">
                                <a href="<?php echo e(route('show.item', $row->id)); ?>">
                                    <span class="product-price"><?php echo e($cur_code . $row->price); ?></span>
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
                </div>
            </div>
        </div>
    </div>
    <div class="other-products">
        <div class="container">
            
            <ul id="flexiselDemo3">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('show.item', $item->id)); ?>">
                            <img src="<?php echo e(asset('images/items/'.$item->images->first()->image)); ?>" class="img-responsive" alt="" />
                        </a>
                        <div class="product liked-product simpleCart_shelfItem">
                            <a class="like_name" href="<?php echo e(route('show.item', $item->id)); ?>"><?php echo e($item->name); ?></a>
                            <p><a class="item_add" href="#"><i></i> <span class="item_price"><?php echo e($cur_code . $item->price); ?></span></a></p>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <h3><?php echo e('تابعنا: '); ?>

                    <a class="twitter" href="<?php echo e($sys_variables->tweeter_url); ?>"></a>
                    <a class="facebook" href="<?php echo e($sys_variables->facebook_url); ?>"></a>
                </h3>
            </div>
            <div class="col-md-4 shipping-grid">
                
                <div>
                    <h3><?php echo e('عنواننا: '); ?></h3>
                    <p><?php echo e($sys_variables->address); ?></p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 online-order">
                <p><?php echo e('اطلب اونلاين'); ?></p>
                <h3><?php echo e('تلفون: '); ?><a href="<?php echo e('tel:+967 '.$sys_variables->site_phone); ?>"><?php echo e($sys_variables->site_phone); ?></a></h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.flexisel.js')); ?>"></script>
    <script src="<?php echo e(asset('js2/admin/items.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\E-Shop\project\resources\views/home.blade.php ENDPATH**/ ?>