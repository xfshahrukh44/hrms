<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Appraisal')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function () {
            var employee = $('#employee').val();
            getEmployee(employee);
        });

        $(document).on('change', 'select[name=branch]', function () {
            var branch = $(this).val();
            getEmployee(branch);
        });

        function getEmployee(did) {
            $.ajax({
                url: '<?php echo e(route('branch.employee.json')); ?>',
                type: 'POST',
                data: {
                    "branch": did, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    $('#employee').empty();
                    $('#employee').append('<option value=""><?php echo e(__('Select Branch')); ?></option>');
                    $.each(data, function (key, value) {
                        $('#employee').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }


    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Appraisal')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Appraisal')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Appraisal List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Appraisal')): ?>
                                        <a href="#" data-url="<?php echo e(route('appraisal.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-title="<?php echo e(__('Create New Appraisal')); ?>">
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
                                            <th><?php echo e(__('Branch')); ?></th>
                                            <th><?php echo e(__('Department')); ?></th>
                                            <th><?php echo e(__('Designation')); ?></th>
                                            <th><?php echo e(__('Employee')); ?></th>
                                            <th><?php echo e(__('Appraisal Date')); ?></th>
                                            <?php if( Gate::check('Edit Appraisal') ||Gate::check('Delete Appraisal') ||Gate::check('Show Appraisal')): ?>
                                                <th class="text-right" width="200px"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $appraisals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appraisal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(!empty($appraisal->branches)?$appraisal->branches->name:''); ?></td>
                                                <td><?php echo e(!empty($appraisal->employees)?!empty($appraisal->employees->department)?$appraisal->employees->department->name:'':''); ?></td>
                                                <td><?php echo e(!empty($appraisal->employees)?!empty($appraisal->employees->designation)?$appraisal->employees->designation->name:'':''); ?></td>
                                                <td><?php echo e(!empty($appraisal->employees)?$appraisal->employees->name:''); ?></td>
                                                <td><?php echo e($appraisal->appraisal_date); ?></td>
                                                <?php if( Gate::check('Edit Appraisal') ||Gate::check('Delete Appraisal') ||Gate::check('Show Appraisal')): ?>
                                                    <td class="text-right">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Appraisal')): ?>
                                                            <a href="#" data-url="<?php echo e(route('appraisal.show',$appraisal->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Appraisal Detail')); ?>" class="btn btn-outline-warning btn-sm mr-1"><i class="fas fa-eye"></i> <span><?php echo e(__('Show')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Appraisal')): ?>
                                                            <a href="#" data-url="<?php echo e(route('appraisal.edit',$appraisal->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Appraisal')); ?>" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Appraisal')): ?>
                                                            <a href="#" class="btn btn-outline-danger btn-sm" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($appraisal->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['appraisal.destroy', $appraisal->id],'id'=>'delete-form-'.$appraisal->id]); ?>

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

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/appraisal/index.blade.php ENDPATH**/ ?>