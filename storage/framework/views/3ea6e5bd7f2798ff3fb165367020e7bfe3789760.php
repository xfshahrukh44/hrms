<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php
    $logo=asset(Storage::url('uploads/logo/'));
$lang=\App\Utility::getValByName('default_language');
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link href="<?php echo e(asset('assets/default/render/bootstrap-fileinput/bootstrap-fileinput.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/default/render/bootstrap-fileinput/bootstrap-fileinput.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Settings')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Settings')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row justify-content-center mt-5 mb-1">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="setting-tab">
                                    <ul class="nav nav-pills mb-3" id="myTab3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="contact-tab4" data-toggle="tab" href="#site-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Site Setting')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#email-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Email Setting')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#payment-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Payment Setting')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#pusher-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Pusher Setting')); ?></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="tab-pane fade fade show active" id="site-setting" role="tabpanel" aria-labelledby="profile-tab3">
                                            <div class="company-setting-wrap">
                                                <?php echo e(Form::model($settings,array('url'=>'settings','method'=>'POST','enctype' => "multipart/form-data"))); ?>

                                                <div class="card-body">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <h5><?php echo e(__('Logo')); ?></h5>
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail h-150">
                                                                        <img src="<?php echo e($logo.'/logo.png'); ?>" alt="">
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                                    <div>
                                                                        <span class="btn btn-primary btn-file">
                                                                            <span class="fileinput-new"> <?php echo e(__('Select image')); ?> </span>
                                                                            <span class="fileinput-exists"> <?php echo e(__('Change')); ?> </span>
                                                                            <input type="hidden">
                                                                            <input type="file" name="logo" id="logo">
                                                                        </span>
                                                                        <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo e(__('Remove')); ?> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <h5><?php echo e(__('Small Logo')); ?></h5>
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail h-150">
                                                                        <img src="<?php echo e($logo.'/small_logo.png'); ?>" alt="">
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                                    <div>
                                                                        <span class="btn btn-primary btn-file">
                                                                            <span class="fileinput-new"> <?php echo e(__('Select image')); ?> </span>
                                                                            <span class="fileinput-exists"> <?php echo e(__('Change')); ?> </span>
                                                                            <input type="hidden">
                                                                            <input type="file" name="small_logo" id="small_logo">
                                                                        </span>
                                                                        <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo e(__('Remove')); ?> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <h5><?php echo e(__('Favicon')); ?></h5>
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail h-150">
                                                                        <img src="<?php echo e($logo.'/favicon.png'); ?>" alt="">
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                                    <div>
                                                                        <span class="btn btn-primary btn-file">
                                                                            <span class="fileinput-new"> <?php echo e(__('Select image')); ?> </span>
                                                                            <span class="fileinput-exists"> <?php echo e(__('Change')); ?> </span>
                                                                            <input type="hidden">
                                                                            <input type="file" name="favicon" id="favicon">
                                                                        </span>
                                                                        <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo e(__('Remove')); ?> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-20">
                                                            <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-logo" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                             </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="row mt-20">
                                                            <div class="form-group col-md-6">
                                                                <?php echo e(Form::label('title_text',__('Title Text'))); ?>

                                                                <?php echo e(Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))); ?>

                                                                <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-title_text" role="alert">
                                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                 </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <?php echo e(Form::label('footer_text',__('Footer Text'))); ?>

                                                                <?php echo e(Form::text('footer_text',null,array('class'=>'form-control','placeholder'=>__('Footer Text')))); ?>

                                                                <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-footer_text" role="alert">
                                                                     <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <?php echo e(Form::label('default_language',__('Default Language'))); ?>

                                                                <div class="changeLanguage">
                                                                    <select name="default_language" id="default_language" class="form-control selectric">
                                                                        <?php $__currentLoopData = \App\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e($language); ?>"><?php echo e(Str::upper($language)); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                                </div>
                                                <?php echo e(Form::close()); ?>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="email-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                            <div class="email-setting-wrap">
                                                <?php echo e(Form::open(array('route'=>'email.settings','method'=>'post'))); ?>

                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('mail_driver',__('Mail Driver'))); ?>

                                                        <?php echo e(Form::text('mail_driver',env('MAIL_DRIVER'),array('class'=>'form-control','placeholder'=>__('Enter Mail Driver')))); ?>

                                                        <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-mail_driver" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('mail_host',__('Mail Host'))); ?>

                                                        <?php echo e(Form::text('mail_host',env('MAIL_HOST'),array('class'=>'form-control ','placeholder'=>__('Enter Mail Driver')))); ?>

                                                        <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-mail_driver" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('mail_port',__('Mail Port'))); ?>

                                                        <?php echo e(Form::text('mail_port',env('MAIL_PORT'),array('class'=>'form-control','placeholder'=>__('Enter Mail Port')))); ?>

                                                        <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-mail_port" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('mail_username',__('Mail Username'))); ?>

                                                        <?php echo e(Form::text('mail_username',env('MAIL_USERNAME'),array('class'=>'form-control','placeholder'=>__('Enter Mail Username')))); ?>

                                                        <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-mail_username" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('mail_password',__('Mail Password'))); ?>

                                                        <?php echo e(Form::text('mail_password',env('MAIL_PASSWORD'),array('class'=>'form-control','placeholder'=>__('Enter Mail Password')))); ?>

                                                        <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-mail_password" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('mail_encryption',__('Mail Encryption'))); ?>

                                                        <?php echo e(Form::text('mail_encryption',env('MAIL_ENCRYPTION'),array('class'=>'form-control','placeholder'=>__('Enter Mail Encryption')))); ?>

                                                        <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-mail_encryption" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('mail_from_address',__('Mail From Address'))); ?>

                                                        <?php echo e(Form::text('mail_from_address',env('MAIL_FROM_ADDRESS'),array('class'=>'form-control','placeholder'=>__('Enter Mail From Address')))); ?>

                                                        <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-mail_from_address" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('mail_from_name',__('Mail From Name'))); ?>

                                                        <?php echo e(Form::text('mail_from_name',env('MAIL_FROM_NAME'),array('class'=>'form-control','placeholder'=>__('Enter Mail Encryption')))); ?>

                                                        <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-mail_from_name" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                                </div>
                                                <?php echo e(Form::close()); ?>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="payment-setting" role="tabpanel">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="payment-setting-wrap">
                                                            <?php echo e(Form::model($settings,['route'=>'payment.settings', 'method'=>'POST'])); ?>

                                                            <div class="form-text">
                                                                <h6><?php echo e(__("This detail will use for collect payment on invoice from clients. On invoice client will find out pay now button based on your below configuration.")); ?></h6>
                                                            </div>
                                                            <div class="row card-body pb-0">
                                                                <div class="form-group col-md-6">
                                                                    <?php echo e(Form::label('currency_symbol',__('Currency Symbol *'))); ?>


                                                                    <?php echo e(Form::text('currency_symbol',env('CURRENCY_SYMBOL'),array('class'=>'form-control','required'))); ?>

                                                                    <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-currency_symbol" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <?php echo e(Form::label('currency',__('Currency *'))); ?>

                                                                    <?php echo e(Form::text('currency',env('CURRENCY'),array('class'=>'form-control font-style','required'))); ?>

                                                                    <small> <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?><br> <a href="https://stripe.com/docs/currencies" target="_blank"><?php echo e(__('you can find out here..')); ?></a></small> <br>
                                                                    <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-currency" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-bottom-0 pb-0">
                                                                <h5><?php echo e(__('Stripe')); ?></h5>
                                                            </div>
                                                            <div class="row card-body pb-0">
                                                                <div class="form-group col-md-12">
                                                                    <?php echo e(Form::label('is_enable_stripe',__('Enable Stripe'), ['class' => 'custom-toggle-btn'])); ?>

                                                                    <label class="custom-switch mt-2">
                                                                        <input type="checkbox" name="enable_stripe" class="custom-switch-input" <?php echo e(env('ENABLE_STRIPE') == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <span class="custom-switch-indicator"></span>
                                                                    </label>

                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <?php echo e(Form::label('stripe_key',__('Stripe Key'))); ?>

                                                                    <?php echo e(Form::text('stripe_key',env('STRIPE_KEY'),['class'=>'form-control','placeholder'=>__('Enter Stripe Key')])); ?>

                                                                    <?php $__errorArgs = ['stripe_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-stripe_key" role="alert">
                                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                             </span>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <?php echo e(Form::label('stripe_secret',__('Stripe Secret'))); ?>

                                                                    <?php echo e(Form::text('stripe_secret',env('STRIPE_SECRET'),['class'=>'form-control ','placeholder'=>__('Enter Stripe Secret')])); ?>

                                                                    <?php $__errorArgs = ['stripe_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-stripe_secret" role="alert">
                                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                             </span>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-bottom-0 pb-0">
                                                                <h5><?php echo e(__('Paypal')); ?></h5>
                                                            </div>
                                                            <div class="row card-body pb-0">
                                                                <div class="form-group col-md-12">
                                                                    <?php echo e(Form::label('enable_stripe',__('Enable Paypal'), ['class' => 'custom-toggle-btn'])); ?>


                                                                    <label class="custom-switch mt-2">
                                                                        <input type="checkbox" name="enable_paypal" class="custom-switch-input" <?php echo e(env('ENABLE_PAYPAL') == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <span class="custom-switch-indicator"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="paypal_mode"><?php echo e(__('Paypal Mode')); ?></label>
                                                                    <div class="selectgroup w-50">
                                                                        <label class="selectgroup-item">
                                                                            <input type="radio" name="paypal_mode" value="sandbox" class="selectgroup-input" <?php echo e(env('PAYPAL_MODE') == '' || env('PAYPAL_MODE') == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                            <span class="selectgroup-button"><?php echo e(__('Sandbox')); ?></span>
                                                                        </label>
                                                                        <label class="selectgroup-item">
                                                                            <input type="radio" name="paypal_mode" value="live" class="selectgroup-input" <?php echo e(env('PAYPAL_MODE') == 'live' ? 'checked="checked"' : ''); ?>>
                                                                            <span class="selectgroup-button"><?php echo e(__('Live')); ?></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="paypal_client_id"><?php echo e(__('Client ID')); ?></label>
                                                                    <input type="text" name="paypal_client_id" id="paypal_client_id" class="form-control" value="<?php echo e(env('PAYPAL_CLIENT_ID')); ?>" placeholder="<?php echo e(__('Client ID')); ?>"/>
                                                                    <?php if($errors->has('paypal_client_id')): ?>
                                                                        <span class="invalid-feedback d-block">
                                                        <?php echo e($errors->first('paypal_client_id')); ?>

                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="paypal_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                    <input type="text" name="paypal_secret_key" id="paypal_secret_key" class="form-control" value="<?php echo e(env('PAYPAL_SECRET_KEY')); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                                    <?php if($errors->has('paypal_secret_key')): ?>
                                                                        <span class="invalid-feedback d-block">
                                                        <?php echo e($errors->first('paypal_secret_key')); ?>

                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-right">
                                                                <?php echo e(Form::submit(__('Save Changes'),['class'=>'btn btn-primary'])); ?>

                                                            </div>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="pusher-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                            <div class="stripe-setting-wrap">
                                                <?php echo e(Form::open(array('route'=>'pusher.settings','method'=>'post'))); ?>


                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('pusher_app_id',__('Pusher App Id'))); ?>

                                                        <?php echo e(Form::text('pusher_app_id',env('PUSHER_APP_ID'),array('class'=>'form-control','placeholder'=>__('Enter Pusher App Id')))); ?>

                                                        <?php $__errorArgs = ['pusher_app_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-pusher_app_id" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('pusher_app_key',__('Pusher App Key'))); ?>

                                                        <?php echo e(Form::text('pusher_app_key',env('PUSHER_APP_KEY'),array('class'=>'form-control ','placeholder'=>__('Enter Pusher App Key')))); ?>

                                                        <?php $__errorArgs = ['pusher_app_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-pusher_app_key" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('pusher_app_secret',__('Pusher App Secret'))); ?>

                                                        <?php echo e(Form::text('pusher_app_secret',env('PUSHER_APP_SECRET'),array('class'=>'form-control ','placeholder'=>__('Enter Pusher App Secret')))); ?>

                                                        <?php $__errorArgs = ['pusher_app_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-pusher_app_secret" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('pusher_app_cluster',__('Pusher App Cluster'))); ?>

                                                        <?php echo e(Form::text('pusher_app_cluster',env('PUSHER_APP_CLUSTER'),array('class'=>'form-control ','placeholder'=>__('Enter Pusher App Cluster')))); ?>

                                                        <?php $__errorArgs = ['pusher_app_cluster'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-pusher_app_cluster" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                                </div>
                                                <?php echo e(Form::close()); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/setting/system_settings.blade.php ENDPATH**/ ?>