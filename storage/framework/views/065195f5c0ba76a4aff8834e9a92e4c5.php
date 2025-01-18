<?php
    use App\Arrays\Lists;
    use Carbon\Carbon;
?>

<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>

    <?php $__currentLoopData = $maintenances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td><?php echo e($row->number); ?></td>
            <td><?php echo e($row->asset_id); ?>-<?php echo e($row->asset->name); ?></td>
            <td><?php echo e($row->request_date); ?></td>
            <td><?php echo e($row->completion_date); ?></td>
            <td>
                <?php $__currentLoopData = Lists::MAINTENANCE_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->status == $key): ?>
                        <?php echo e($value); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td><?php echo e($row->maintenance_cost); ?></td>
            <td><?php echo e($row->description); ?></td>
            <td><?php echo e($row->technician_name); ?></td>
            <td><?php echo e($row->status); ?></td>
            <td>
                
                <a href="#" title="تعديل"><i class="fas fa-edit EditBtn"></i></a>
                <input type="hidden" class="url-edit" value="<?php echo e($urls['edit']); ?><?php echo e($row->id); ?>">
                <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
                <a type="button" title="حذف"><i class="fas fa-trash DeleteBtn"></i></a>
                <input type="hidden" class="url-delet" value="<?php echo e($urls['delete']); ?><?php echo e($row->id); ?>">
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links-pagination'); ?>
    <?php echo $maintenances->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <div id="add-edit-pop-form">
        <div class="form-group col-md-2">
            <label for="number">رقم الطلب <span class="text-danger">*</span></label>
            <input type="number" name="number" value="<?php echo e(old('number', App\Models\Maintenance::getSequenceNo())); ?>"
                class="form-control" id="number">
            <?php if($errors->has('number')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('number')); ?></small>
                </span>
            <?php endif; ?>

        </div>
        <div class="form-group col-md-3">
            <label class="control-label">حالة الطلب</label>
            <select onchange="toggleSecondInput()" name="status" class="form-control custom-select rounded-0"
                id="status">
                <?php $__currentLoopData = Lists::MAINTENANCE_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('status')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('status')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            <label class="control-label">اسم الاصل<span class="text-danger">*</span></label>
            <select name="asset_id" class="form-control custom-select rounded-0" id="asset_id">
                <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php echo e(old('asset_id') == $item->id ? 'selected' : ''); ?>>
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
        <div class="form-group col-md-4">
            <label>تاريخ الطلب <span class="text-danger">*</span></label>
            
            <input type="date" value="<?php echo e(old('request_date', date('Y/d/m', strtotime(Carbon::now())))); ?>"
                name="request_date" id="request_date" class="form-control">
            <?php if($errors->has('request_date')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('request_date')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3 " id="completion" style="display: none;">
            <label>تاريخ اكمال الطلب </label>
            
            <input type="date" value="<?php echo e(old('completion_date')); ?>" name="completion_date" id="completion_date"
                class="form-control">
            <?php if($errors->has('completion_date')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('completion_date')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            <label class="control-label">نوع الصيانة<span class="text-danger">*</span></label>
            <select name="maintenance_type" class="form-control custom-select rounded-0" id="maintenance_type">
                <option value="" disabled selected>اختر نوع الصيانة</option>
                <?php $__currentLoopData = Lists::MAINTENANCE_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('maintenance_type')): ?>
                <span class="help-block">
                    <small class="text-sm text-danger"><?php echo e($errors->first('maintenance_type')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            <label for="maintenance_cost">تكلفة الصيانة <span class="text-danger">*</span></label>
            <input type="number" name="maintenance_cost" value="<?php echo e(old('maintenance_cost')); ?>" class="form-control"
                id="maintenance_cost">
            <?php if($errors->has('maintenance_cost')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('maintenance_cost')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            <label for="technician_name">اسم الفني <span class="text-danger">*</span></label>
            <input type="text" name="technician_name" value="<?php echo e(old('technician_name')); ?>" class="form-control"
                id="technician_name">
            <?php if($errors->has('technician_name')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('technician_name')); ?></small>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-3">
            
            <label>ملاحظة</label>
            <textarea name="description" id="description" id="form" cols="30" rows="1" class="form-control"><?php echo e(old('description')); ?></textarea>
            <?php if($errors->has('description')): ?>
                <span class="help-block">
                    <small class="form-text text-danger"><?php echo e($errors->first('description')); ?></small>
                </span>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script>
    function toggleSecondInput() {
        const status = document.getElementById("status");
        const completion = document.getElementById("completion");

        // Define the ASSET_STATUS object with the desired values
        const MAINTENANCE_STATUS = {
            '1': 'قيد الانتظار',
            '2': 'قيد الصيانة',
            '3': 'مغلق',

        };

        if (MAINTENANCE_STATUS[status.value] === 'مغلق') {
            completion.style.display = "";
        } else {
            completion.style.display = "none";
        }
        //         // استرجاع حقل الحالة
        // let statusField = document.getElementById('status');

        // // استرجاع حقل تاريخ الإغلاق
        // let completionDateField = document.getElementById('completion_date');

        // // التحقق من قيمة حقل الحالة
        // if (statusField.value === 'مغلق') {
        //   // إنشاء كائن Date جديد
        //   let currentDate = new Date();
        //   let formattedDate = currentDate.toLocaleString();

        //   // تعبئة حقل تاريخ الإغلاق بالتاريخ والوقت المناسب
        //   completionDateField.value = formattedDate;

        //   // عرض حقل تاريخ الإغلاق
        //   completionDateField.parentElement.parentElement.style.display = 'block';
        // } else {
        //   // إذا لم يكن حقل الحالة مغلقًا، قم بإخفاء حقل تاريخ الإغلاق
        //   completionDateField.parentElement.parentElement.style.display = 'none';
        // }
    }
</script>
<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js/admin/maintenance.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/maintenance/manage.blade.php ENDPATH**/ ?>