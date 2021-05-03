<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo')).'/favicon.png'); ?>" type="image" sizes="16x16">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e((Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'HRLab')); ?> - <?php echo $__env->yieldContent('page-title'); ?></title>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap-social/bootstrap-social.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/select2/dist/css/select2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">

</head>
<body class="bg-default g-sidenav-show g-sidenav-pinned">
<?php echo $__env->yieldContent('content'); ?>

<script src="<?php echo e(asset('assets/modules/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/popper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/moment.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/modules/select2/dist/js/select2.full.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>


</div>
</body>
</html>
<?php /**PATH C:\xampp2\htdocs\hrms\resources\views/layouts/login-reg.blade.php ENDPATH**/ ?>