<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_small_logo=Utility::getValByName('company_small_logo');
    $company_favicon=Utility::getValByName('company_favicon');

?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/jquery-selectric/selectric.css')); ?>">
    <link href="<?php echo e(asset('assets/default/render/bootstrap-fileinput/bootstrap-fileinput.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/default/render/bootstrap-fileinput/bootstrap-fileinput.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/modules/jquery-selectric/jquery.selectric.min.js')); ?>"></script>

    <script>
        $(document).on('change', '.email-template-checkbox', function () {
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {

                },
            });
        });
    </script>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="setting-tab">
                                <ul class="nav nav-pills mb-3" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="contact-tab4" data-toggle="tab" href="#business-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Business Setting')); ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#system-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('System Setting')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#company-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Company Setting')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#email-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Email Notification Setting')); ?></a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade fade show active" id="business-setting" role="tabpanel" aria-labelledby="profile-tab3">
                                        <div class="company-setting-wrap">
                                            <?php echo e(Form::model($settings,array('route'=>'business.setting','method'=>'POST','enctype' => "multipart/form-data"))); ?>

                                            <div class="card-body">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <h5><?php echo e(__('Logo')); ?></h5>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail h-150">
                                                                    <img src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')); ?>" alt="">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                                <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> <?php echo e(__('Select image')); ?> </span>
                                                                <span class="fileinput-exists"> <?php echo e(__('Change')); ?> </span>
                                                                <input type="hidden">
                                                                <input type="file" name="company_logo" id="logo">
                                                            </span>
                                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo e(__('Remove')); ?> </a>
                                                                </div>
                                                            </div>
                                                            <p class="mt-3 text-primary"> <?php echo e(__('These Logo will appear on Bill and Invoice as well.')); ?></p>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <h5><?php echo e(__('Small Logo')); ?></h5>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail h-100">
                                                                    <img src="<?php echo e($logo.'/'.(isset($company_small_logo) && !empty($company_small_logo)?$company_small_logo:'small_logo.png')); ?>" alt="">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                                <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> <?php echo e(__('Select image')); ?> </span>
                                                                <span class="fileinput-exists"> <?php echo e(__('Change')); ?> </span>
                                                                <input type="hidden">
                                                                <input type="file" name="company_small_logo" id="company_small_logo">
                                                            </span>
                                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo e(__('Remove')); ?> </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <h5><?php echo e(__('Favicon')); ?></h5>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail h-100">
                                                                    <img src="<?php echo e($logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')); ?>" alt="">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                                <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> <?php echo e(__('Select image')); ?> </span>
                                                                <span class="fileinput-exists"> <?php echo e(__('Change')); ?> </span>
                                                                <input type="hidden">
                                                                <input type="file" name="company_favicon" id="company_favicon">
                                                            </span>
                                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo e(__('Remove')); ?> </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                            </div>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade fade show" id="system-setting" role="tabpanel" aria-labelledby="profile-tab3">
                                        <div class="company-setting-wrap">
                                            <?php echo e(Form::model($settings,array('route'=>'system.settings','method'=>'post'))); ?>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('site_currency',__('Currency *'))); ?>

                                                        <?php echo e(Form::text('site_currency',null,array('class'=>'form-control font-style'))); ?>

                                                        <?php $__errorArgs = ['site_currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-site_currency" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('site_currency_symbol',__('Currency Symbol *'))); ?>

                                                        <?php echo e(Form::text('site_currency_symbol',null,array('class'=>'form-control'))); ?>

                                                        <?php $__errorArgs = ['site_currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-site_currency_symbol" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="example3cols3Input"><?php echo e(__('Currency Symbol Position')); ?></label>
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-12">
                                                                    <div class="selectgroup w-100">
                                                                        <label class="selectgroup-item">
                                                                            <input type="radio" name="site_currency_symbol_position" value="pre" class="selectgroup-input" <?php if($settings['site_currency_symbol_position'] == 'pre'): ?> checked <?php endif; ?>>
                                                                            <span class="selectgroup-button"><?php echo e(__('Pre')); ?></span>
                                                                        </label>
                                                                        <label class="selectgroup-item">
                                                                            <input type="radio" name="site_currency_symbol_position" value="post" class="selectgroup-input" <?php if($settings['site_currency_symbol_position'] == 'post'): ?> checked <?php endif; ?>>
                                                                            <span class="selectgroup-button"><?php echo e(__('Post')); ?></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="site_date_format" class="form-control-label"><?php echo e(__('Date Format')); ?></label>
                                                        <select type="text" name="site_date_format" class="form-control select2" id="site_date_format">
                                                            <option value="M j, Y" <?php if(@$settings['site_date_format'] == 'M j, Y'): ?> selected="selected" <?php endif; ?>>Jan 1,2015</option>
                                                            <option value="d-m-Y" <?php if(@$settings['site_date_format'] == 'd-m-Y'): ?> selected="selected" <?php endif; ?>>d-m-y</option>
                                                            <option value="m-d-Y" <?php if(@$settings['site_date_format'] == 'm-d-Y'): ?> selected="selected" <?php endif; ?>>m-d-y</option>
                                                            <option value="Y-m-d" <?php if(@$settings['site_date_format'] == 'Y-m-d'): ?> selected="selected" <?php endif; ?>>y-m-d</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="site_time_format" class="form-control-label"><?php echo e(__('Time Format')); ?></label>
                                                        <select type="text" name="site_time_format" class="form-control select2" id="site_time_format">
                                                            <option value="g:i A" <?php if(@$settings['site_time_format'] == 'g:i A'): ?> selected="selected" <?php endif; ?>>10:30 PM</option>
                                                            <option value="g:i a" <?php if(@$settings['site_time_format'] == 'g:i a'): ?> selected="selected" <?php endif; ?>>10:30 pm</option>
                                                            <option value="H:i" <?php if(@$settings['site_time_format'] == 'H:i'): ?> selected="selected" <?php endif; ?>>22:30</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('employee_prefix',__('Employee Prefix'))); ?>

                                                        <?php echo e(Form::text('employee_prefix',null,array('class'=>'form-control'))); ?>

                                                        <?php $__errorArgs = ['employee_prefix'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-employee_prefix" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                            </div>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="company-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                        <div class="email-setting-wrap">
                                            <div class="row">
                                                <?php echo e(Form::model($settings,array('route'=>'company.settings','method'=>'post'))); ?>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <?php echo e(Form::label('company_name *',__('Company Name *'))); ?>

                                                            <?php echo e(Form::text('company_name',null,array('class'=>'form-control font-style'))); ?>

                                                            <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-company_name" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <?php echo e(Form::label('company_address',__('Address'))); ?>

                                                            <?php echo e(Form::text('company_address',null,array('class'=>'form-control font-style'))); ?>

                                                            <?php $__errorArgs = ['company_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-company_address" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <?php echo e(Form::label('company_city',__('City'))); ?>

                                                            <?php echo e(Form::text('company_city',null,array('class'=>'form-control font-style'))); ?>

                                                            <?php $__errorArgs = ['company_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-company_city" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <?php echo e(Form::label('company_state',__('State'))); ?>

                                                            <?php echo e(Form::text('company_state',null,array('class'=>'form-control font-style'))); ?>

                                                            <?php $__errorArgs = ['company_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-company_state" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <?php echo e(Form::label('company_zipcode',__('Zip/Post Code'))); ?>

                                                            <?php echo e(Form::text('company_zipcode',null,array('class'=>'form-control'))); ?>

                                                            <?php $__errorArgs = ['company_zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-company_zipcode" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group  col-md-6">
                                                            <?php echo e(Form::label('company_country',__('Country'))); ?>

                                                            <?php echo e(Form::text('company_country',null,array('class'=>'form-control font-style'))); ?>

                                                            <?php $__errorArgs = ['company_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-company_country" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <?php echo e(Form::label('company_telephone',__('Telephone'))); ?>

                                                            <?php echo e(Form::text('company_telephone',null,array('class'=>'form-control'))); ?>

                                                            <?php $__errorArgs = ['company_telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-company_telephone" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <?php echo e(Form::label('company_email',__('System Email *'))); ?>

                                                            <?php echo e(Form::text('company_email',null,array('class'=>'form-control'))); ?>

                                                            <?php $__errorArgs = ['company_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-company_email" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <?php echo e(Form::label('company_email_from_name',__('Email (From Name) *'))); ?>

                                                            <?php echo e(Form::text('company_email_from_name',null,array('class'=>'form-control font-style'))); ?>

                                                            <?php $__errorArgs = ['company_email_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-company_email_from_name" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <?php echo e(Form::label('company_start_time',__('Company Start Time *'))); ?>


                                                                    <?php echo e(Form::text('company_start_time',null,array('class'=>'form-control timepicker_format'))); ?>

                                                                    <?php $__errorArgs = ['company_start_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-company_start_time" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <?php echo e(Form::label('company_end_time',__('Company End Time *'))); ?>

                                                                    <?php echo e(Form::text('company_end_time',null,array('class'=>'form-control timepicker_format'))); ?>

                                                                    <?php $__errorArgs = ['company_end_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-company_end_time" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?php echo e(Form::label('timezone',__('Timezone'))); ?>

                                                            <select type="text" name="timezone" class="form-control select2" id="timezone">
                                                                <option value=""><?php echo e(__('Select Timezone')); ?></option>
                                                                <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($k); ?>" <?php echo e((env('TIMEZONE')==$k)?'selected':''); ?>><?php echo e($timezone); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                                </div>
                                                <?php echo e(Form::close()); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="email-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                        <div class="email-setting-wrap">
                                            <div class="row">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped mb-0" id="dataTable">
                                                            <thead>
                                                            <tr>
                                                                <th><?php echo e(__('Module')); ?></th>
                                                                <th><?php echo e(__('On/Off')); ?></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = \App\Utility::$emailStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr class="font-style odd" role="row">
                                                                    <td class="sorting_1"><?php echo e($email); ?></td>
                                                                    <td class="action text-right">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <label class="custom-switch">
                                                                                <input type="checkbox" class="custom-switch-input email-template-checkbox" name="<?php echo e($key); ?>" <?php echo e(\App\Utility::getValByName("$key") ==1 ?'checked':''); ?> value="<?php echo e(\App\Utility::getValByName("$key") ==1 ?'1':'0'); ?>" data-url="<?php echo e(route('company.email.setting',$key)); ?>">
                                                                                <span class="custom-switch-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\hrms\resources\views/setting/company_settings.blade.php ENDPATH**/ ?>