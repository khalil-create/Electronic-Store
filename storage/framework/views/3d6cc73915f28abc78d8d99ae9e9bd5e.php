<?php $__env->startSection('title'); ?>
    ادارة الحجوزات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ادارة الحجوزات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">الصفحة الرئيسية</a></li>
                        <li class="breadcrumb-item active">الحجوزات</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div>
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default" style="margin-left: 20px;">
                        <div class="card-header">
                            <h3 class="card-title" style="float: right">إضافة حجز</h3>
                            <div class="card-tools float-right">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <form method="POST" action="/managerSales/storeCustomer"
                                            enctype="multipart/form-data">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="card-body">
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="identity_number" title="الرقم الوطني للبطاقة الشخصية">رقم
                                                        الهوية للعميل</label>
                                                    <input type="number" name="identity_number"
                                                        value="<?php echo e(old('identity_number')); ?>" class="form-control"
                                                        id="identity_number">
                                                    <?php if($errors->has('identity_number')): ?>
                                                        <span class="help-block">
                                                            <small
                                                                class="form-text text-danger"><?php echo e($errors->first('identity_number')); ?></small>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Date and time:</label>
                                                    <div class="input-group date" id="reservationdatetime"
                                                        data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#reservationdatetime">
                                                        <div class="input-group-append" data-target="#reservationdatetime"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="khalil">
                                                        <div class="card-header">
                                                            <h3 class="card-title text-bold">معلومات العميل</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="address">الاسم<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="name"
                                                                        value="<?php echo e(old('name')); ?>" class="form-control">
                                                                    <?php if($errors->has('name')): ?>
                                                                        <span class="help-block">
                                                                            <small
                                                                                class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="address">رقم الهاتف</label>
                                                                    <input id="phonenumber"
                                                                        value="<?php echo e(old('phone_number')); ?>"
                                                                        onkeyup="checkPhoneNumber()" type="text"
                                                                        name="phone_number" class="form-control">
                                                                    <small id="invalidPhoneNo" class="form-text text-danger"
                                                                        hidden></small>
                                                                    <?php if($errors->has('phone_number')): ?>
                                                                        <span class="help-block">
                                                                            <small
                                                                                class="form-text text-danger"><?php echo e($errors->first('phone_number')); ?></small>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label class="control-label">نوع الهوية<span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="type"
                                                                        class="form-control custom-select rounded-0">
                                                                        <option value="1" selected>شخصية</option>
                                                                        <option value="2">جواز سفر</option>
                                                                        <option value="3">عائلية</option>
                                                                    </select>
                                                                    <?php if($errors->has('type')): ?>
                                                                        <span class="help-block">
                                                                            <small
                                                                                class="text-sm text-danger"><?php echo e($errors->first('type')); ?></strong>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="identity_image">صورة الهوية</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file"
                                                                                value="<?php echo e(old('identity_image')); ?>"
                                                                                class="custom-file-input"
                                                                                name="identity_image">
                                                                            <label class="custom-file-label"
                                                                                for="identity_image"></label>
                                                                            <?php if($errors->has('identity_image')): ?>
                                                                                <span class="help-block">
                                                                                    <small
                                                                                        class="form-text text-danger"><?php echo e($errors->first('identity_image')); ?></small>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.card-body -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary font"
                                                        style="margin-top: 10px;">
                                                        حفظ<i class="fas fa-save"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form><!-- /.form -->
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/reservation/add.blade.php ENDPATH**/ ?>