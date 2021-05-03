<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Forgot Password')); ?>

<?php $__env->stopSection(); ?>
<?php
    $logo=asset(Storage::url('uploads/logo/'));
?>
<?php $__env->startSection('content'); ?>
    <div id="app">
        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 pt-4">
                        <div class="changeLanguage float-right mr-1 position-relative">
                            <ul class="navbar-nav navbar-right">
                                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg language-dd"><i class="fas fa-language lang-font"></i></a>
                                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                        <div class="dropdown-header"><?php echo e(__('Choose Language')); ?>

                                        </div>
                                        <div class="dropdown-list-content dropdown-list-icons lang-dropdown">
                                            <?php $__currentLoopData = Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('change.langPass',$language)); ?>" class="dropdown-item dropdown-item-unread">
                                                    <span> <?php echo e(Str::upper($language)); ?></span>
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img class="img-fluid" src="<?php echo e($logo.'/logo.png'); ?>" alt="" width="70%">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header"><h4><?php echo e(__('Forgot Password')); ?></h4></div>
                            <div class="card-body">
                                <p class="text-muted"><?php echo e(__('We will send a link to reset your password')); ?></p>
                                <?php if(session('status')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(session('status')); ?>

                                    </div>
                                <?php endif; ?>
                                <form method="POST" action="<?php echo e(route('password.email')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="email"><?php echo e(__('E-Mail Address')); ?></label>
                                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            <?php echo e(__('Send Password Reset Link')); ?>

                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            <a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
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

<?php echo $__env->make('layouts.login-reg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\hrms\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>