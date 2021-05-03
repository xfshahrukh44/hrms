<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Employee')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Employee')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(__('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><a href="<?php echo e(route('employee.index')); ?>"><?php echo e(__('Employee')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Create')); ?></div>
                </div>
            </div>
            <form method="post" action="<?php echo e(route('employee.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Personal Detail')); ?></h4></div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <?php echo Form::label('name', __('Name')); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('name', old('name'), ['class' => 'form-control','required' => 'required']); ?>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo Form::label('dob', __('Date of Birth')); ?><span class="text-danger pl-1">*</span>
                                                <?php echo Form::text('dob', old('dob'), ['class' => 'form-control datepicker']); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group ">
                                                <?php echo Form::label('gender', __('Gender')); ?><span class="text-danger pl-1">*</span>
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="gender" value="Male" class="selectgroup-input" checked>
                                                        <span class="selectgroup-button"><?php echo e(__('Male')); ?></span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="gender" value="Female" class="selectgroup-input">
                                                        <span class="selectgroup-button"><?php echo e(__('Female')); ?></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('phone', __('Phone')); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::number('phone',old('phone'), ['class' => 'form-control']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('address', __('Address')); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::textarea('address',old('address'), ['class' => 'form-control']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('email', __('Email')); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::email('email',old('email'), ['class' => 'form-control','required' => 'required']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('password', __('Password')); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::password('password', ['class' => 'form-control','required' => 'required']); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Company Detail')); ?></h4></div>
                                <div class="card-body">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <?php echo Form::label('employee_id', __('Employee ID')); ?>

                                        <?php echo Form::text('employee_id', $employeesId, ['class' => 'form-control','disabled'=>'disabled']); ?>

                                    </div>

                                    <div class="form-group">
                                        <?php echo e(Form::label('branch_id', __('Branch'))); ?>

                                        <?php echo e(Form::select('branch_id', $branches,null, array('class' => 'form-control  select2','required'=>'required'))); ?>

                                    </div>

                                    <div class="form-group">
                                        <?php echo e(Form::label('department_id', __('Department'))); ?>

                                        <?php echo e(Form::select('department_id', $departments,null, array('class' => 'form-control  select2','id'=>'department_id','required'=>'required'))); ?>

                                    </div>

                                    <div class="form-group">
                                        <?php echo e(Form::label('designation_id', __('Designation'))); ?>

                                        <select class="select2 form-control select2-multiple" id="designation_id" name="designation_id" data-toggle="select2" data-placeholder="<?php echo e(__('Select Designation ...')); ?>">
                                            <option value=""><?php echo e(__('Select any Designation')); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('company_doj', __('Company Date Of Joining')); ?>

                                        <?php echo Form::text('company_doj', null, ['class' => 'form-control datepicker','required' => 'required']); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Document')); ?></h4></div>
                                <div class="card-body">
                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="form-group col-10">
                                                <div class="float-left">
                                                    <label for="document" class="float-left pt-1"><?php echo e($document->name); ?> <?php if($document->is_required == 1): ?> <span class="text-danger">*</span> <?php endif; ?></label>
                                                </div>
                                                <div class="float-right">
                                                    <input class="form-control float-right <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0" <?php if($document->is_required == 1): ?> required <?php endif; ?> name="document[<?php echo e($document->id); ?>]" type="file" id="document[<?php echo e($document->id); ?>]" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Bank Account Detail')); ?></h4></div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <?php echo Form::label('account_holder_name', __('Account Holder Name')); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('account_holder_name', old('account_holder_name'), ['class' => 'form-control']); ?>


                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('account_number', __('Account Number')); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::number('account_number', old('account_number'), ['class' => 'form-control']); ?>


                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('bank_name', __('Bank Name')); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('bank_name', old('bank_name'), ['class' => 'form-control']); ?>


                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('bank_identifier_code', __('Bank Identifier Code')); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('bank_identifier_code',old('bank_identifier_code'), ['class' => 'form-control']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('branch_location', __('Branch Location')); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('branch_location',old('branch_location'), ['class' => 'form-control']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('tax_payer_id', __('Tax Payer Id')); ?>

                                        <?php echo Form::text('tax_payer_id',old('tax_payer_id'), ['class' => 'form-control']); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo Form::submit('Create', ['class' => 'btn btn-primary btn-lg float-right']); ?>

            <?php echo Form::close(); ?>

        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>

    <script>

        $(document).ready(function () {
            var d_id = $('#department_id').val();
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department_id]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        function getDesignation(did) {

            $.ajax({
                url: '<?php echo e(route('employee.json')); ?>',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value=""><?php echo e(__('Select any Designation')); ?></option>');
                    $.each(data, function (key, value) {
                        $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/employee/create.blade.php ENDPATH**/ ?>