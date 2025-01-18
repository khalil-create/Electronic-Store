<?php $__env->startSection('title'); ?>
    <?php echo e($head_data['head']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header content-wrapper">
        
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <?php echo e($head_data['head']); ?>

                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e($urls['head-link']); ?>"><?php echo e($head_data['head']); ?></a></li>
                        <?php if(isset($head_data['head3'])): ?>
                            <?php if($urls['head-link2'] != null): ?>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo e($urls['head-link2']); ?>"><?php echo e($head_data['head3']); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li class="breadcrumb-item active"><?php echo e($head_data['head2']); ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title" style="float: right"><?php echo e($head_data['card-title']); ?><?php echo $__env->yieldContent('card-title'); ?></span>
                        <div class="card-tools float-right">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <?php echo $__env->yieldContent('card-body'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting number" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">
                                                #
                                            </th>
                                            <?php $__currentLoopData = $thead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1">
                                                    <?php echo e($th); ?>

                                                </th>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($exist['events'])): ?>
                                            <?php else: ?>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">
                                                    العملية
                                                </th>
                                            <?php endif; ?>
                                    </thead>
                                    <tbody>
                                        <div>
                                            <?php if(isset($exist['btn_add'])): ?>
                                            <?php else: ?>
                                                <a href="<?php echo e(url($urls['btn-add-link'])); ?>" class="btn btn-primary add"><i
                                                        class="fas fa-plus"></i> <?php echo e($head_data['add']); ?></a>
                                            <?php endif; ?>
                                            <?php echo $__env->yieldContent('other-btn'); ?>
                                        </div>
                                        <?php echo $__env->yieldContent('tbody'); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">#</th>
                                            <?php $__currentLoopData = $thead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <th rowspan="1" colspan="1"><?php echo e($tf); ?></th>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($exist['events'])): ?>
                                            <?php else: ?>
                                                <th>العملية</th>
                                            <?php endif; ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- container-fluid -->
        </div><!-- content -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        // $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.DeleteBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).closest("tr").find('.id').val();
            var urldelet = $(this).closest("tr").find('.url-delet').val();
            var id2 = $(this).closest("tr").find('.id2').val();
            var id3 = $(this).closest("tr").find('.id3').val();

            swal({
                    title: "هل انت متأكد من حذف البيانات?",
                    text: "عند حذفك للبيانات المحددة لايمكنك استرجاعها!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var data = {
                            "_token": $('input[name=_token]').val(),
                            "id": id,
                            "id2": id2,
                            "id3": id3,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: urldelet,
                            data: data,
                            // dataType: "data"
                            success: function(response) {
                                swal(response.status, {
                                        icon: "success",
                                        button: "حسناً!",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            },
                            error: function(response) {
                                swal(response.status, {
                                    icon: "error",
                                    button: "هناك خطأ!",
                                })
                            }
                        });

                    }
                });
        });
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/layouts/base.blade.php ENDPATH**/ ?>