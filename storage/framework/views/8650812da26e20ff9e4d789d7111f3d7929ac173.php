<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Event')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fullcalendar/fullcalendar.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Event')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Event')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Event List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Event')): ?>
                                        <a href="#" data-url="<?php echo e(route('event.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Create New Event')); ?>" data-original-title="<?php echo e(__('Create Event')); ?>">
                                            <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="fc-overflow font-style">
                                <div id="myEvent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $__env->startPush('script-page'); ?>
        <script src="<?php echo e(asset('assets/modules/fullcalendar/fullcalendar.min.js')); ?>"></script>
        <script>
            var arrEvents =<?php echo $arrEvents; ?>

        </script>
        <script src="<?php echo e(asset('assets/js/page/modules-calendar.js')); ?>"></script>

        <script>

            $(document).ready(function () {
                var b_id = $('#branch_id').val();
                getDepartment(b_id);
            });
            $(document).on('change', 'select[name=branch_id]', function () {
                var branch_id = $(this).val();
                getDepartment(branch_id);
            });

            function getDepartment(bid) {

                $.ajax({
                    url: '<?php echo e(route('event.getdepartment')); ?>',
                    type: 'POST',
                    data: {
                        "branch_id": bid, "_token": "<?php echo e(csrf_token()); ?>",
                    },
                    success: function (data) {

                        $('#department_id').empty();
                        $('#department_id').append('<option value=""><?php echo e(__('Select Department')); ?></option>');

                        $('#department_id').append('<option value="0"> <?php echo e(__('All Department')); ?> </option>');
                        $.each(data, function (key, value) {
                            $('#department_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }

            $(document).on('change', '#department_id', function () {
                var department_id = $(this).val();
                getEmployee(department_id);
            });

            function getEmployee(did) {

                $.ajax({
                    url: '<?php echo e(route('event.getemployee')); ?>',
                    type: 'POST',
                    data: {
                        "department_id": did, "_token": "<?php echo e(csrf_token()); ?>",
                    },
                    success: function (data) {
                        console.log(data);
                        $('#employee_id').empty();
                        $('#employee_id').append('<option value=""><?php echo e(__('Select Employee')); ?></option>');
                        $('#employee_id').append('<option value="0"> <?php echo e(__('All Employee')); ?> </option>');

                        $.each(data, function (key, value) {
                            $('#employee_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }
        </script>

    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/event/index.blade.php ENDPATH**/ ?>