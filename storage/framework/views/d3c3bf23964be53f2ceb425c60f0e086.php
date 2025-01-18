<?php
    use App\Arrays\Lists;
    use Carbon\Carbon;
?>

<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>

    <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td><?php echo e($row->number); ?></td>
            <td><?php echo e($row->name); ?></td>
            <td>
                <?php $__currentLoopData = Lists::ASSET_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->status == $key): ?>
                        <?php echo e($value); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td><?php echo e(number_format($row->price, 2)); ?><?php echo e('ريال يمني'); ?></td>
            <td><?php echo e($row->default_age); ?><?php echo e('سنين '); ?></td>
            <td><?php echo e($row->assettype_id); ?>-<?php echo e($row->assettype->name); ?></td>
            <td><?php echo e($row->location_id); ?></td>
            <td><?php echo e($row->replacement_asset_id); ?> </td>
            <td>
                
                <a href="#" title="تعديل"><i class="fas fa-edit EditBtn"></i></a>
                <input type="hidden" class="url-edit" value="<?php echo e($urls['edit']); ?><?php echo e($row->id); ?>">
                <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
                <a type="button" title="حذف"><i class="fas fa-trash DeleteBtn"></i></a>
                <input type="hidden" class="url-delet" value="<?php echo e($urls['delete']); ?><?php echo e($row->id); ?>">
                <a type="button" title="اضافة الى غرفة"><i class="fas fa-plus-circle AddToRoomBtn"></i></a>
                <input type="hidden" class="url-add-to-room" value="<?php echo e($urls['add-to-room']); ?><?php echo e($row->id); ?>">
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links-pagination'); ?>
    <?php echo $assets->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <div id="add-edit-pop-form">
        <div class="form-group col-md-2">
            <label for="number">رقم الاصل <span class="text-danger">*</span></label>
            <input type="number" name="number" value="<?php echo e(old('number', App\Models\Asset::getSequenceNo())); ?>"
                class="form-control" id="number">
            <?php if($errors->has('number')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('number')); ?></small>
                </span>
            <?php endif; ?>

        </div>
        <div class="form-group col-md-4">
            <label for="name">اسم الاصل<span class="text-danger">*</span></label>
            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name">
            <?php if($errors->has('name')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            <label for="address">السعر <span class="text-danger">*</span></label>
            <input type="number" name="price" value="<?php echo e(old('price')); ?>" class="form-control" id="price">
            <?php if($errors->has('price')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('price')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            <label class="control-label">حالة الاصل</label>
            <select onchange="toggleSecondInput()" name="status" class="form-control custom-select rounded-0"
                id="status">
                <?php $__currentLoopData = Lists::ASSET_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('status')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('status')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-2">
            <label for="address">العمر الافتراضي <span class="text-danger">*</span></label>
            <input type="number" name="default_age" value="<?php echo e(old('default_age')); ?>" class="form-control"
                id="default_age">
            <?php if($errors->has('default_age')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('default_age')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label">نوع الاصل<span class="text-danger">*</span></label>
            <select name="assettype_id" class="form-control custom-select rounded-0" id="assettype_id">
                <?php $__currentLoopData = $assets_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php echo e(old('assettype_id') == $item->id ? 'selected' : ''); ?>>
                        <?php echo e($item->number); ?> <?php echo e(' - '); ?> <?php echo e($item->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('assettype_id')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('assettype_id')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            <label class="control-label">الموقع <span class="text-danger">*</span></label>
            <select name="location_id" class="form-control custom-select rounded-0" id="location_id">
                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php echo e(old('location_id') == $item->id ? 'selected' : ''); ?>>
                        <?php echo e($item->number); ?> <?php echo e(' - '); ?> <?php echo e($item->name); ?>


                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('location_id')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('location_id')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3" id="asset_old">
            <label class="control-label">الاصل القديم<span class="text-danger">*</span></label>
            <select name="replacement_asset_id" class="form-control custom-select rounded-0" id="replacement_asset_id"
                disabled>
                <option value="">-- اختر خياراً --</option>
                <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(old('replacement_asset_id') != $item->id && $item->id != $item->replacement_asset_id): ?>
                        <option value="<?php echo e($item->id); ?>"
                            <?php echo e(old('replacement_asset_id') == $item->id ? 'selected' : ''); ?>>
                            <?php echo e($item->replacement_asset_id); ?> <?php echo e(' - '); ?> <?php echo e($item->name); ?>

                            <?php echo e(' - '); ?> <?php echo e($item->location_id); ?>

                        </option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('replacement_asset_id')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('replacement_asset_id')); ?></small>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div id="add-to-room" style="display: none">
        <div class="form-group col-md-6">
            <label class="control-label">الاصل<span class="text-danger">*</span></label>
            <select name="asset" class="form-control custom-select rounded-0" id="asset">
                
            </select>
            <?php if($errors->has('asset')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('asset')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">الغرفة<span class="text-danger">*</span></label>
            <select name="room" class="form-control custom-select rounded-0" id="room">
                
            </select>
            <?php if($errors->has('room')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('room')); ?></small>
                </span>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<script>
    function toggleSecondInput() {
        const status = document.getElementById("status");
        const replacement_asset_id = document.getElementById("replacement_asset_id");

        // Define the ASSET_STATUS object with the desired values
        const ASSET_STATUS = {
            '1': 'جديد',
            '2': 'قيد الاستخدام',
            '3': 'تحت الصيانة',
            '4': 'بدل تالف',
            '5': 'بدل مباع',
            '6': 'بدل مهلك',
            '7': 'مهلك',
            '8': 'مباع',
            '9': 'تالف',
            '10': 'مخزون',
        };

        if (ASSET_STATUS[status.value] === 'بدل تالف' || ASSET_STATUS[status.value] === 'بدل مهلك' || ASSET_STATUS[
                status.value] === 'بدل مباع') {
            replacement_asset_id.disabled = false;
            // asset_old.style.display = "";
        } else {
            replacement_asset_id.disabled = true;
            // asset_old.style.display = "none";
            //in asset_old open style="display: none;
        }
    }
</script>
<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js/admin/asset.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/asset/manage.blade.php ENDPATH**/ ?>