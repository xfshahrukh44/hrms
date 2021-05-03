<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Employee Profile')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Employee Profile')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Employee Profile')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="staff-wrap">
                                    <?php echo e(Form::open(array('route' => array('employee.profile'),'method' => 'GET'))); ?>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <?php echo e(Form::label('branch', __('Branch'))); ?>

                                            <?php echo e(Form::select('branch',$brances,isset($_GET['branch'])?$_GET['branch']:'', array('class' => 'form-control font-style select2','data-toggle'=>"select2"))); ?>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <?php echo e(Form::label('department', __('Department'))); ?>

                                            <?php echo e(Form::select('department',$departments,isset($_GET['department'])?$_GET['department']:'', array('class' => 'form-control font-style select2','data-toggle'=>"select2"))); ?>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <?php echo e(Form::label('designation', __('Designation'))); ?>

                                            <select class="select2 form-control select2-multiple" id="designation_id" name="designation" data-toggle="select2" data-placeholder="<?php echo e(__('Select Designation ...')); ?>">
                                                <option value=""><?php echo e(__('Designation')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Search')); ?></button>
                                        <a href="<?php echo e(route('employee.profile')); ?>" class="btn btn-danger"><?php echo e(__('Reset')); ?></a>
                                    </div>
                                    <?php echo e(Form::close()); ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Manage Employee Profile')); ?></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="staff-wrap">
                                    <div class="row">
                                        <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="staff staff-grid-view pb-0">
                                                    <div class="contact-img">
                                                        <img src="<?php echo e(!empty($employee->user->avatar) ? asset(Storage::url('uploads/avatar')).'/'.$employee->user->avatar : asset(Storage::url('uploads/avatar')).'/avatar.png'); ?>">
                                                    </div>
                                                    <div class="main-info mb-4">
                                                        <h2 class="m-0"><?php echo e($employee->name); ?></h2>
                                                        <p><?php echo e(!empty($employee->designation)?$employee->designation->name:''); ?></p>
                                                    </div>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Employee Profile')): ?>
                                                        <div class="meta-info mb-3">
                                                            <a href="<?php echo e(route('show.employee.profile',\Illuminate\Support\Facades\Crypt::encrypt($employee->id))); ?>" class="btn btn-sm btn-primary"><?php echo e(\Auth::user()->employeeIdFormat($employee->employee_id)); ?></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="meta-info mb-3">
                                                            <a href="#" class="btn btn-sm btn-primary"><?php echo e(\Auth::user()->employeeIdFormat($employee->employee_id)); ?></a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h6><?php echo e(__('there is no employee')); ?></h6>
                                                </div>
                                            </div>
                                        <?php endif; ?>
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
<?php $__env->startPush('script-page'); ?>

    <script>

        $(document).ready(function () {
            var d_id = $('#department').val();
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department]', function () {
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
                    $('#designation_id').append('<option value=""><?php echo e(__('Select Designation')); ?></option>');
                    $.each(data, function (key, value) {
                        $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/employee/profile.blade.php ENDPATH**/ ?>