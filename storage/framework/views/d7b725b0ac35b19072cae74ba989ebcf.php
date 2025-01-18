<?php
    use App\Arrays\Lists;
    use Carbon\Carbon;
?>

<?php $__env->startSection('card-body'); ?>
    <div id="reserve">
        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($r->reservations->where('status', '1')->count() > 0): ?>
                
                <a class="btn btn-app bg-success"
                    title="<?php echo e($r->reservations->first()->customer->name); ?>"><?php echo e($r->number); ?></a>
            <?php else: ?>
                <a class="btn btn-app reserveRoom" title="حجز الغرفة">
                    <?php echo e($r->number); ?>

                    <input type="hidden" class="url-reserve" value="<?php echo e($urls['reserve']); ?><?php echo e($r->id); ?>">
                    <input type="hidden" class="room-id" value="<?php echo e($r->id); ?>">
                </a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>
    <!-- /.card-body -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <input type="text" name="customer_id" value="<?php echo e(old('customer_id')); ?>" id="customer_id" hidden>
    <div class="form-group col-md-4">
        <label for="identity_number" title="الرقم الوطني للبطاقة الشخصية">رقم الهوية للعميل<span
                class="text-danger">*</span></label>
        <input type="number" name="identity_number" value="<?php echo e(old('identity_number')); ?>" class="form-control"
            id="identity_number" onchange="getCustomerData(this)">
        <?php if($errors->has('identity_number')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('identity_number')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label>وقت الدخول<span class="text-danger">*</span></label>
        <div class="input-group date" id="entrydatetime" data-target-input="nearest">
            <input type="text" value="<?php echo e(old('entry_time')); ?>" name="entry_time" id="entry_time"
                class="form-control datetimepicker-input" data-target="#entrydatetime">
            <div class="input-group-append" data-target="#entrydatetime" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        <?php if($errors->has('entry_time')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('entry_time')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label>وقت الخروج <span class="text-danger">*</span></label>
        <div class="input-group date" id="exitdatetime" data-target-input="nearest">
            <input type="text" value="<?php echo e(old('exit_time')); ?>" name="exit_time" id="exit_time"
                class="form-control datetimepicker-input" data-target="#exitdatetime">
            <div class="input-group-append" data-target="#exitdatetime" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        <?php if($errors->has('exit_time')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('exit_time')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    
    <div class="form-group col-md-4">
        <label class="control-label">الغرفة<span class="text-danger">*</span></label>
        <div class="container-list" id="room_no">
            <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($room->whereHas('reservations')): ?>
                    <?php if($room->reservations->where('status', '1')->count() <= 0): ?>
                        <input type="checkbox" name="room_number[]" value="<?php echo e($room->id); ?>"
                            <?php echo e(old('room_number.*') == $room->id ? 'checked' : ''); ?> />
                        <?php echo e($room->number); ?><br>
                    <?php endif; ?>
                <?php else: ?>
                    <input type="checkbox" name="room_number[]" value="<?php echo e($room->id); ?>"
                        <?php echo e(old('room_number.*') == $room->id ? 'checked' : ''); ?> />
                    <?php echo e($room->number); ?><br>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if($errors->has('room_number')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('room_number')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label for="price_total">السعر<span class="text-danger">*</span></label>
        <input type="number" name="price_total" id="price_total" value="<?php echo e(old('price_total')); ?>" class="form-control">
        <?php if($errors->has('price_total')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('price_total')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label class="control-label">نوع الحجز<span class="text-danger">*</span></label>
        <select name="reserve_type" class="form-control custom-select rounded-0" id="reserve_type">
            <?php $__currentLoopData = $reserveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type->id); ?>" <?php echo e(old('reserve_type') == $type->id ? 'selected' : ''); ?>>
                    <?php echo e($type->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('reserve_type')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('reserve_type')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-12">
        <div class="khalil">
            <div class="card-header">
                <h3 class="card-title text-bold">معلومات العميل</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name">الاسم<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>"
                            class="form-control">
                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="address">رقم الهاتف</label>
                        <input id="phonenumber" value="<?php echo e(old('phone_number')); ?>" onkeyup="checkPhoneNumber()"
                            type="number" name="phone_number" class="form-control">
                        <small id="invalidPhoneNo" class="form-text text-danger" hidden></small>
                        <?php if($errors->has('phone_number')): ?>
                            <span class="help-block">
                                <small class="form-text text-danger"><?php echo e($errors->first('phone_number')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">نوع الهوية<span class="text-danger">*</span></label>
                        <select name="identity_type" class="form-control custom-select rounded-0" id="identity_type">
                            <?php $__currentLoopData = Lists::IDENTITY_TYPES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('type')): ?>
                            <span class="help-block">
                                <small class="text-sm text-danger"><?php echo e($errors->first('type')); ?></small>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="identity_image">صورة الهوية</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="<?php echo e(old('identity_image')); ?>" class="custom-file-input"
                                    name="identity_image">
                                <label class="custom-file-label" for="identity_image"></label>
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
    <div class="form-group col-md-12">
        <label>ملاحظة</label>
        <textarea name="note" id="note" id="form" cols="30" rows="2" class="form-control"><?php echo e(old('note')); ?></textarea>
        <?php if($errors->has('note')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('note')); ?></small>
            </span>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js/admin/reservation.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/user/home.blade.php ENDPATH**/ ?>