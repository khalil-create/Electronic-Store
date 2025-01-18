<?php $__env->startSection('title'); ?>
    <?php echo e(__('Add post')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3><?php echo e(__('Add post')); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form method="POST" action="<?php echo e(route('store.post')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-body border">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="title"><?php echo e(__('Title')); ?><span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="title" value="<?php echo e(old('title')); ?>"
                                                    class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title">
                                                <?php if($errors->has('title')): ?>
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger"><?php echo e($errors->first('title')); ?></small>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <textarea name="tags" id='txt_tagsjsondata' hidden></textarea>
                                            <div class="form-group col-md-12">
                                                <label for="Tags">
                                                    <?php echo e(__('Tags')); ?>

                                                    <span class="help-block float-right">
                                                        <small
                                                            class="form-text text-danger"><?php echo e('(enter space between tags)'); ?></small>
                                                    </span>
                                                </label>
                                                <div class="row" id="tags-container">
                                                    <div class="select2-search--inline col-md-4">
                                                        <input id="tag-input" onkeyup="checkTeg(this)" class="form-control"
                                                            type="text" tabindex="0"
                                                            placeholder="e.x tag1 tag2 tag3 ..." style="width: 100%;">
                                                        <span class="help-block">
                                                            <small id="error-tag" class="form-text text-danger"></small>
                                                        </span>
                                                    </div>
                                                    <span
                                                        class="col-md-8 select2 select2-container select2-container--default select2-container--below select2-container--focus"
                                                        dir="ltr" data-select2-id="8" style="width: 80%;">
                                                        <span class="selection">
                                                            <span class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true" aria-expanded="false"
                                                                tabindex="-1" aria-disabled="false">
                                                                <ul class="select2-selection__rendered row" id="listTags">
                                                                </ul>
                                                            </span>
                                                        </span>
                                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                    </span>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label><?php echo e(__('Content')); ?><span class="text-danger">*</span></label>
                                                <textarea name="content" id="content" cols="30" rows="6" placeholder="content..."
                                                    class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('content')); ?></textarea>
                                                <?php if($errors->has('content')): ?>
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger"><?php echo e($errors->first('content')); ?></small>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary font"
                                                    style="margin: 10px">
                                                    <?php echo e(__('Save')); ?> <i class="fas fa-save"></i>
                                                </button>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.card-body -->
                                </form>
                            </div><!-- /.form -->
                        </div><!-- /.col -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        tagNo = 0;

        function checkTeg(e) {
            $('#error-tag').empty();
            var tag = e.value;
            let lastCharTag = tag.charAt(tag.length - 1);
            if (lastCharTag == ' ') {
                addTag();
            }
        }
        const tagInput = document.getElementById('tag-input');
        const tagsContainer = document.getElementById('tags-container');
        const addTagBtn = document.getElementById('add-tag-btn');

        function addTag() {
            const tagValue = tagInput.value.trim();
            // Check for empty input or duplicate tags
            if (tagValue !== '' && !isDuplicateTag(tagValue)) {
                // const tagElement = document.createElement('span');
                // const classSelect2 = ['select2', 'select2-container', 'select2-container--default',
                //     'select2-container--below', 'select2-container--focus'
                // ];
                // tagElement.classList.add(...classSelect2);
                // const tagElement2 = document.createElement('span');
                // tagElement2.classList.add('selection');
                // // tagElement2.id = 'myId';
                // tagElement.textContent = tagValue;

                // const removeTagBtn = document.createElement('span');
                // removeTagBtn.classList.add('remove-tag');
                // removeTagBtn.innerHTML = '&times;';
                // removeTagBtn.addEventListener('click', () => removeTag(tagElement));

                // tagElement.appendChild(removeTagBtn);
                // tagsContainer.appendChild(tagElement);

                idTag = `tag-${tagValue}-${++tagNo}`;
                let li = `
                    <li class="select2-selection__choice myTag" title="${tagValue}" id="${idTag}">
                        <span class="remove-tag" onclick="removeTag('${idTag}')"
                            role="presentation">
                            ×
                        </span>
                        ${tagValue}
                    </li>`;
                $('#listTags').append(li);
            } else {
                tagBold = '<b>' + tagValue + '</b>';
                $('#error-tag').show().append(tagBold + ' tag is already exist');
            }
            tagInput.value = '';
            $('#txt_tagsjsondata').empty().append(getTags().join(','));
        }

        function isDuplicateTag(tagValue) {
            const tagElements = document.querySelectorAll('.myTag');
            const tags = Array.from(tagElements).map(tag => tag.title.toLowerCase());
            console.log(tags);
            return tags.includes(tagValue.toLowerCase());
        }

        function removeTag(tagElement) {
            tag = document.getElementById(tagElement);
            listTags = document.getElementById('listTags');
            listTags.removeChild(tag);
            // $('#listTags').children('li').remove(tagElement);
        }

        function getTags() {
            const tagElements = document.querySelectorAll('.myTag');
            const tags = Array.from(tagElements).map(tag => tag.title);
            return tags;
        }

        document.querySelector('form').addEventListener('submit', event => {
            event.preventDefault();
            const tags = getTags();
        });

        function savePost() {
            console.log("getTags()");
            console.log(getTags());
            $.ajax({
                url: '/posts/store',
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    // "_token": $('input[name=_token]').val(),
                    'tags': getTags()
                },
                dataType: "json",
                success: function(response) {
                    console.log("responsellllllllllllllllll");
                    console.log(response);
                    if (response.status == 1) {
                        swal(response.msg, {
                                icon: "success",
                                button: "Ok",
                            })
                            // .then((result) => {
                            //     location.reload();
                            // });
                    } else {
                        swal(response.msg, {
                            icon: "error",
                            button: "حسناً",
                        });
                    }
                },
                error: function(response) {
                    console.log('error: function(response)');
                    console.log(response);
                    if (response.responseJSON.message) {
                        swal(response.responseJSON.message, {
                            icon: "error",
                            button: "حسناً",
                        });
                    }
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\Free Host On 000webhost\Blog\Blog\resources\views/posts/add.blade.php ENDPATH**/ ?>