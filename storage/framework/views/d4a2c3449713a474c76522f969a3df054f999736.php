<?php
    $logo=asset(Storage::url('uploads/logo/'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Forgot Password')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img class="img-fluid logo-img" src="<?php echo e($logo.'/logo.png'); ?> " alt="" width="70%">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header"><h4><?php echo e(__('Reset Password')); ?></h4></div>
                            <div class="card-body">
                                <?php echo e(Form::open(array('route'=>'password.update','method'=>'post','id'=>'loginForm'))); ?>

                                <input type="hidden" name="token" value="<?php echo e($token); ?>">
                                <div class="form-group">
                                    <?php echo e(Form::label('email',__('E-Mail Address'))); ?>

                                    <?php echo e(Form::text('email',null,array('class'=>'form-control'))); ?>

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-email text-danger" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo e(Form::label('password',__('Password'))); ?>

                                    <?php echo e(Form::password('password',array('class'=>'form-control'))); ?>

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-password text-danger" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo e(Form::label('password_confirmation',__('Password Confirmation'))); ?>

                                    <?php echo e(Form::password('password_confirmation',array('class'=>'form-control'))); ?>

                                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-password_confirmation text-danger" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <?php echo e(Form::submit(__('Reset Password'),array('class'=>'btn btn-primary btn-block','id'=>'resetBtn'))); ?>

                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                        <div class="simple-footer">
                            <?php echo e((Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright HRMGo')); ?> <?php echo e(date('Y')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login-reg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\hrms\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>