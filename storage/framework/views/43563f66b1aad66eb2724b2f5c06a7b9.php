<?php if(session('status')): ?>
    <input value="<?php echo e(session('status')); ?>" id="success" hidden>
    
    <script>
        var msg = document.getElementById('success').value;
        // console.log(msg);
        swal(msg, {
            icon: "success",
            button: "حسناً",
            timer: 2000,
        })
    </script>
<?php endif; ?>
<?php if(session('error')): ?>
    <input value="<?php echo e(session('error')); ?>" id="error" hidden>
    <script>
        var msg = document.getElementById('error').value;
        // console.log(msg);
        swal(msg, {
            icon: "error",
            button: "حسناً",
        })
    </script>
<?php endif; ?>
<?php if($errors->any()): ?>
    <script>
        openForm();
    </script>
<?php else: ?>
    <script>
        closeForm();
        // location.reload();
    </script>
<?php endif; ?>

<?php /**PATH E:\Laravel\E-Shop\project\resources\views/swal-msg.blade.php ENDPATH**/ ?>