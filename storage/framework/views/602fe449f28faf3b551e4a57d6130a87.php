<?php
    use App\Arrays\Lists;
    use Carbon\Carbon;
?>

<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>
    <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td><?php echo e($row->number); ?></td>
            <td><?php echo e($row->type->name); ?></td>
            <td><?php echo e($row->customer->name); ?></td>
            <td>
                <?php $__currentLoopData = $row->rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span>، <?php echo e($room->number); ?> </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td><?php echo e($row->entry_time); ?></td>
            <td><?php echo e($row->exit_time); ?></td>
            
            
            <td>
                <?php $__currentLoopData = Lists::RESERVATION_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->status == $key): ?>
                        <a href="#"  title="<?php echo e($key == 1 ? 'إلغاء التفعيل' : 'تفعيل'); ?>">
                            <b class="text-<?php echo e($key == 1 ? 'success' : 'danger'); ?> activateBtn"><?php echo e($value); ?></b>
                        </a>
                        <input type="hidden" class="url-activate" value="<?php echo e($urls['activate']); ?><?php echo e($row->id); ?>">
                        
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td>
                <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
                <?php if(!$row->operations->count()): ?>
                    <a href="#" title="تعديل"><i class="fas fa-edit EditBtn"></i></a>
                    <input type="hidden" class="url-edit" value="<?php echo e($urls['edit']); ?><?php echo e($row->id); ?>">
                <?php endif; ?>

                <input type="hidden" class="url-delet" value="<?php echo e($urls['delete']); ?><?php echo e($row->id); ?>">
                <a type="button"><i class="fas fa-trash DeleteBtn"></i></a>

                <a href="#"><i class="nav-icon fas fa-eye DetailBtn" title="تفاصيل"></i></a>
                <input type="hidden" class="url-details" value="<?php echo e($urls['details']); ?><?php echo e($row->id); ?>">

                <?php if(!$row->operations->count()): ?>
                    <a href="#"><i class="nav-icon fas fa-plus ConfirmBtn" title="تأكيد الحجز"></i></a>
                    <input type="hidden" class="url-confirm" value="<?php echo e($urls['confirm']); ?><?php echo e($row->id); ?>">
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links-pagination'); ?>
    <?php echo $reservations->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-tabs'); ?>
    <div class="row float-left">
        
        <div class="card-primary card-tabs">
            <div class="card-header p-0 pt-1 manage-reserve">
                <ul class="nav nav-tabs" id="custom-tabs-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-manage-tab" data-toggle="pill" href="#custom-tabs-manage"
                            role="tab" aria-controls="custom-tabs-manage" aria-selected="true">ادارة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-reserve-tab" data-toggle="pill" href="#custom-tabs-reserve"
                            role="tab" aria-controls="custom-tabs-reserve" aria-selected="false">حجز</a>
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-body2'); ?>
    <div id="reserve" hidden>
        <?php if($rooms->count()): ?>
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
        <?php else: ?>
            <p class="text-center bg-gradient-danger p-2 m-3"><?php echo e('لاتوجد غرف حاليا'); ?></p>
        <?php endif; ?>
    </div>
    <!-- /.card-body -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <!-- /.card -->
    
    <!-- /.card -->
    <input type="text" name="customer_id" value="<?php echo e(old('customer_id')); ?>" id="customer_id" hidden>
    <div class="form-group col-md-3">
        <label for="identity_number" title="الرقم الوطني للبطاقة الشخصية">رقم الهوية للعميل<span
                class="text-danger ">*</span></label>
        <input type="number" name="identity_number" value="<?php echo e(old('identity_number')); ?>" class="form-control"
            id="identity_number" onchange="getCustomerData(this)">
        <?php if($errors->has('identity_number')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('identity_number')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-3">
        <label for="number">رقم الحجز <span class="text-danger">*</span></label>
        <input type="number" name="number" value="<?php echo e(old('number', App\Models\Reservation::getSequenceNo())); ?>" class="form-control" id="number">
        <?php if($errors->has('number')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('number')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-3">
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
    <div class="form-group col-md-3">
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
    
    <table id="mytable" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
        aria-describedby="example1_info">
        <thead style="background-color: #8eaab1;">
            <tr role="row">
                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">
                    رقم الغرفة
                </th>
                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">
                    السعر
                </th>
                <th style="width: 5%"></th>
            </tr>
        </thead>
        <tbody>
            <?php if($errors->count()): ?>
                <?php
                    $old_price = old('price');
                    $i = 0;
                ?>
                <?php $__currentLoopData = old('room'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old_room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="one">
                        <td class="form-group col-6">
                            <select name="room[]" class="form-control custom-select rounded-0 room" id="room-1"
                                required>
                                <option value="">اختر رقم الغرفة</option>
                                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($room->whereHas('reservations')): ?>
                                        <?php if($room->reservations->where('status', '1')->count() <= 0): ?>
                                            <option <?php echo e($old_room == $room->id ? 'selected' : ''); ?>

                                                price="<?php echo e(App\Models\SystemVariable::first()->price_room); ?>">
                                                <?php echo e($room->number); ?>

                                            </option>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <option <?php echo e($old_room == $room->id ? 'selected' : ''); ?>

                                            price="<?php echo e(App\Models\SystemVariable::first()->price_room); ?>">
                                            <?php echo e($room->number); ?>

                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('room.' . $i)): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('room.' . $i)); ?></small>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="form-group col-6">
                            <input type="number" value="<?php echo e($old_price[$i]); ?>" name="price[]"
                                class="form-control price" required readonly id="price-1">
                            <?php if($errors->has('price.' . $i)): ?>
                                <span class="help-block">
                                    <small class="form-text text-danger"><?php echo e($errors->first('price.' . $i)); ?></small>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="#" onclick="deleteRow(this, true)">
                                <i class="nav-icon fas fa-trash" title="حذف"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr class="one">
                    <td class="form-group col-6">
                        <select name="room[]" class="form-control custom-select rounded-0 room" id="room-1">
                            <option selected value="">اختر رقم الغرفة</option>
                            <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($room->whereHas('reservations')): ?>
                                    <?php if($room->reservations->where('status', '1')->count() <= 0): ?>
                                        <option value="<?php echo e($room->id); ?>"
                                            price="<?php echo e(App\Models\SystemVariable::first()->price_room); ?>">
                                            <?php echo e($room->number); ?>

                                        </option>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <option value="<?php echo e($room->id); ?>"
                                        price="<?php echo e(App\Models\SystemVariable::first()->price_room); ?>">
                                        <?php echo e($room->number); ?>

                                    </option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td class="form-group col-6">
                        <input type="number" name="price[]" class="form-control price" readonly id="price-1">
                    </td>
                    <td>
                        <a href="#" onclick="deleteRow(this, true)">
                            <i class="nav-icon fas fa-trash" title="حذف"></i>
                        </a>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td id="add-row" onclick="addRow()" rowspan="1" colspan="2" class="btn"
                    style="background-color: #8eaab1">
                    <i class="nav-icon fas fa-plus" title="اضافة"></i>
                </td>
                <td>
                    <label class="col-md-6 float-right">الاجمالي<span class="text-danger">*</span></label>
                    <input type="number" name="total_amount" id="total_amount" value="<?php echo e(old('total_amount')); ?>"
                        class="form-control col-md-6" readonly>
                    <?php if($errors->has('total_amount')): ?>
                        <span class="help-block">
                            <small class="form-text text-danger"><?php echo e($errors->first('total_amount')); ?></small>
                        </span>
                    <?php endif; ?>
                </td>
            </tr>
        </tfoot>
    </table>
    

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
    <div class="form-group col-md-8">
        <label>ملاحظة</label>
        <textarea name="note" id="note" id="form" cols="30" rows="1" class="form-control"><?php echo e(old('note')); ?></textarea>
        <?php if($errors->has('note')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('note')); ?></small>
            </span>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('details'); ?>
    <div class="card-body" id="card-body-details" hidden>
        <div class="row">
            <div id="col-1" class="col-12 col-sm-6 col-md-4 col-box">
                <h5>معلومات الحجز</h5>

                <b>تأريخ الدخول:</b>
                <p id="detail-entry-date"></p>

                <b>تأريخ الخروج:</b>
                <p id="detail-exit-date"></p>

                <b>إجمالي المبلغ:</b>
                <p id="detail-price"></p>

                <b>نوع الحجز:</b>
                <p id="detail-type"></p>
            </div>
            <div id="col-2" class="col-12 col-sm-6 col-md-3 col-box">
                <h5>معلومات الغرف</h5>
            </div>
            <div id="col-3" class="col-12 col-sm-6 col-md-4 col-box">
                <h5>معلومات العميل</h5>

                <div class="info">
                    <b>الاسم: </b>
                    <p id="detail-cust-name"></p>

                    <b>رقم الهاتف: </b>
                    <p id="detail-cust-phone"></p>

                    <b>رقم الحساب: </b>
                    <p id="detail-cust-account"></p>

                    <b>رقم الهوية: </b>
                    <p id="detail-cust-identity-no"></p>

                    <b>نوع الهوية: </b>
                    <p id="detail-cust-identity-type"></p>

                    <b>صورة الهوية:</b>
                    <img id="detail-cust-identity-img" src="" class="rectangle-img"
                        alt="Customer Identity Image">
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script2'); ?>
    
    
    <script src="<?php echo e(asset('js/admin/reservation.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/reservation/manage.blade.php ENDPATH**/ ?>