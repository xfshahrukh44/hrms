<?php
    $profile=asset(Storage::url('uploads/avatar/'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Profile Account')); ?>

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
                <h1><?php echo e(__('Account Setting')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Account Setting')); ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-sidebar">
                                <div class="portlet light profile-sidebar-portlet ">
                                    <div class="profile-userpic">
                                        <img alt="" src="<?php echo e((!empty($userDetail->avatar))? $profile.'/'.$userDetail->avatar : $profile.'/avatar.png'); ?>" class="img-responsive user-profile">
                                    </div>
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name font-style"> <?php echo e($userDetail->name); ?></div>
                                        <div class="profile-usertitle-job font-style"> <?php echo e($userDetail->type); ?></div>
                                        <div class="profile-usertitle-job"> <?php echo e($userDetail->email); ?></div>
                                    </div>
                                    <div class="profile-usermenu">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between w-100">
                                        <h4><?php echo e(__('Manage Account')); ?></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="setting-tab">
                                        <ul class="nav nav-pills mb-3" id="myTab3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#personal_info" role="tab" aria-controls="" aria-selected="true"><?php echo e(__('Personal Info')); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#change_password" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Change Password')); ?></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane fade show active" id="personal_info" role="tabpanel" aria-labelledby="home-tab3">
                                                <?php echo e(Form::model($userDetail,array('route' => array('update.account'), 'method' => 'put', 'enctype' => "multipart/form-data"))); ?>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('name',__('Name'),array('class'=>'form-control-label'))); ?>

                                                            <?php echo e(Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter User Name')))); ?>

                                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-name" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?php echo e(Form::label('email',__('Email'),array('class'=>'form-control-label'))); ?>

                                                        <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter User Email')))); ?>

                                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-email" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail thumbnail-h2">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""></div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                            <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> <?php echo e(__('Select image')); ?> </span>
                                                                <span class="fileinput-exists"> <?php echo e(__('Change')); ?> </span>
                                                                <input type="hidden">
                                                                <input type="file" name="profile" id="logo">
                                                            </span>
                                                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo e(__('Remove')); ?> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 text-right">
                                                        <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></a>
                                                        <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                                    </div>
                                                </div>
                                                <?php echo e(Form::close()); ?>

                                            </div>
                                            <div class="tab-pane fade" id="change_password" role="tabpanel" aria-labelledby="profile-tab3">
                                                <div class="company-setting-wrap">
                                                    <?php echo e(Form::model($userDetail,array('route' => array('update.password'), 'method' => 'put'))); ?>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?php echo e(Form::label('current_password',__('Current Password'),array('class'=>'form-control-label'))); ?>

                                                                <?php echo e(Form::password('current_password',array('class'=>'form-control','placeholder'=>__('Enter Current Password')))); ?>

                                                                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-current_password" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?php echo e(Form::label('new_password',__('New Password'),array('class'=>'form-control-label'))); ?>

                                                            <?php echo e(Form::password('new_password',array('class'=>'form-control','placeholder'=>__('Enter New Password')))); ?>

                                                            <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-new_password" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?php echo e(Form::label('confirm_password',__('Re-type New Password'),array('class'=>'form-control-label'))); ?>

                                                            <?php echo e(Form::password('confirm_password',array('class'=>'form-control','placeholder'=>__('Enter Re-type New Password')))); ?>

                                                            <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-confirm_password" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="col-lg-12 text-right">
                                                            <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></a>
                                                            <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                                        </div>
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
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/user/profile.blade.php ENDPATH**/ ?>