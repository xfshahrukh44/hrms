<!DOCTYPE html>
<html>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php echo $__env->make('partial.Admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('css-page'); ?>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <?php echo $__env->make('partial.Admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partial.Admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
<?php echo $__env->make('partial.Admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp2\htdocs\hrms\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>