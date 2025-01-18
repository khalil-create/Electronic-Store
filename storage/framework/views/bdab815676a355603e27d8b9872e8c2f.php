<?php
    use App\Arrays\Lists;
?>

<?php $__env->startSection('tbody'); ?>
    <?php $i = 1; ?>
    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td class="dtr-control" tabindex="0"><?php echo e($i++); ?></td>
            <td><?php echo e($row->name); ?></td>
            <td><?php echo e($row->account_number); ?></td>
            <td>
                <?php if($row->group): ?>
                    <p><?php echo e('نعم'); ?></p>
                <?php else: ?>
                    <p><?php echo e('لا'); ?></p>
                <?php endif; ?>
            </td>
            <td>
                <?php if($row->parent_account): ?>
                    <?php echo e($row->parent_account->name); ?> (<?php echo e($row->parent_account->account_number); ?>)
                <?php else: ?>
                    <?php echo e('لايوجد'); ?>

                <?php endif; ?>
            </td>
            <td><?php echo e($row->balance); ?></td>
            <td>
                <?php $__currentLoopData = Lists::ACCOUNT_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->active == $key): ?>
                        <span><?php echo e($value); ?></span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td>
                <a href="#" title="تعديل"><i class="fas fa-edit EditBtn"></i></a>
                <input type="hidden" class="url-edit" value="<?php echo e($urls['edit']); ?><?php echo e($row->id); ?>">
                <input type="hidden" class="id" value="<?php echo e($row->id); ?>">
                <input type="hidden" class="url-delet" value="<?php echo e($urls['delete']); ?><?php echo e($row->id); ?>">
                <a type="button"><i class="fas fa-trash DeleteBtn"></i></a>
                <!-- <a href="/admin/reservation/details/<?php echo e($row->id); ?>"><i class="nav-icon fas fa-eye" title="تفاصيل"></i></a> -->
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links-pagination'); ?>
    <?php echo $accounts->links(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pop-form'); ?>
    <div class="form-group col-md-4" id="parent_account">
        <label class="control-label">حساب الأب</label>
        <select name="parent_id" onchange="getSequenceAccountNo(this)" class="form-control custom-select rounded-0"
            id="parent_id">
            <option selected value="">----- اختر حساب الأب -----</option>
            <?php $__currentLoopData = $all_acc->where('group', '1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($acc->id); ?>" <?php echo e(old('parent_id') == $acc->id ? 'selected' : ''); ?>>
                    <?php echo e($acc->account_number); ?> <?php echo e($acc->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('parent_id')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('parent_id')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label for="name">اسم الحساب<span class="text-danger">*</span></label>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name">
        <?php if($errors->has('name')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label for="account_number">رقم الحساب<span class="text-danger">*</span></label>
        <input type="number" name="account_number" value="<?php echo e(old('account_number')); ?>" class="form-control"
            id="account_number" readonly>
        <?php if($errors->has('account_number')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('account_number')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label class="control-label">حساب رئيسي</label>
        <select name="group" class="form-control custom-select rounded-0" id="group">
            <option value="">----- اختر خياراً -----</option>
            <option value="0" selected>
            
                <?php echo e('لا'); ?>

            </option>
            <option value="1" <?php echo e(old('group') == 1 ? 'selected' : ''); ?>>
                <?php echo e('نعم'); ?>

            </option>
        </select>
        <?php if($errors->has('group')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('group')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label class="control-label">التفعيل</label>
        <select name="active" class="form-control custom-select rounded-0" id="active">
            <option value="">----- اختر خياراً -----</option>
            <option value="1" selected>مفعل</option>
            
            <option value="0" <?php echo e(old('active') == 0 ? 'selected' : ''); ?>>غير مفعل</option>
        </select>
        <?php if($errors->has('active')): ?>
            <span class="help-block">
                <small class="text-sm text-danger"><?php echo e($errors->first('active')); ?></small>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-4">
        <label>ملاحظة</label>
        <textarea name="note" id="note" id="form" cols="30" rows="2" class="form-control"><?php echo e(old('note')); ?></textarea>
        <?php if($errors->has('note')): ?>
            <span class="help-block">
                <small class="form-text text-danger"><?php echo e($errors->first('note')); ?></small>
            </span>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-tabs'); ?>
    <div class="row float-left">
        <div class="card-primary card-tabs">
            <div class="card-header p-0 pt-1"> <!-- manage-reserve -->
                <ul class="nav nav-tabs" id="custom-tabs-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-manage-tab" data-toggle="pill" href="#custom-tabs-manage"
                            role="tab" aria-controls="custom-tabs-manage" aria-selected="true">ادارة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-treeview-tab" data-toggle="pill" href="#custom-tabs-treeview"
                            role="tab" aria-controls="custom-tabs-treeview" aria-selected="false">شجرة الحسابات</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-body2'); ?>
    <div id="treeview" hidden>
        <div class="refresh-tree">
            <h5 class="float-right">
                شجرة الحسابات
            </h5>
            <a href="#" onclick="getAccountTree()"><i class="fas fa-download" title="تحديث الشجرة"></i></a>
        </div>
        <div id="acc_jstree" class="demo"></div>
        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!--  can be deleted files  -->
    <link href="<?php echo e(asset('css/tree-view-canbedelete.css')); ?>" rel="stylesheet" />
    <!-- jstree style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/jstree/style.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script2'); ?>
    <script src="<?php echo e(asset('js/admin/jstree.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/account.js')); ?>"></script>
    <!--  can be deleted files  -->
    <script src="<?php echo e(asset('js/tree-view-canbedelete.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Open Source Systems\Hotal Managment System\project\resources\views/admin/account/manage.blade.php ENDPATH**/ ?>