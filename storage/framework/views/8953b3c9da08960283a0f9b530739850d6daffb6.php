<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Announcement')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fullcalendar/fullcalendar.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Announcement')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Announcement')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Announcement List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Announcement')): ?>
                                        <a href="#" data-url="<?php echo e(route('announcement.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Create New Announcement')); ?>" data-original-title="<?php echo e(__('Create Announcement')); ?>">
                                            <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Start Date')); ?></th>
                                            <th><?php echo e(__('End Date')); ?></th>
                                            <th><?php echo e(__('description')); ?></th>
                                            <?php if(Gate::check('Edit Announcement') || Gate::check('Delete Announcement')): ?>
                                                <th width="200px"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($announcement->title); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($announcement->start_date)); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($announcement->end_date)); ?></td>
                                                <td><?php echo e($announcement->description); ?></td>
                                                <?php if(Gate::check('Edit Announcement') || Gate::check('Delete Announcement')): ?>
                                                    <td>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Announcement')): ?>
                                                            <a href="#" data-url="<?php echo e(URL::to('announcement/'.$announcement->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Announcement')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Announcement')): ?>
                                                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($announcement->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['announcement.destroy', $announcement->id],'id'=>'delete-form-'.$announcement->id]); ?>

                                                            <?php echo Form::close(); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>
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
        </section>
    </div>
    <?php $__env->startPush('script-page'); ?>
        <script>

            //Branch Wise Deapartment Get
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
                    url: '<?php echo e(route('announcement.getdepartment')); ?>',
                    type: 'POST',
                    data: {
                        "branch_id": bid, "_token": "<?php echo e(csrf_token()); ?>",
                    },
                    success: function (data) {
                        console.log(data);
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
                    url: '<?php echo e(route('announcement.getemployee')); ?>',
                    type: 'POST',
                    data: {
                        "department_id": did, "_token": "<?php echo e(csrf_token()); ?>",
                    },
                    success: function (data) {

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


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/announcement/index.blade.php ENDPATH**/ ?>