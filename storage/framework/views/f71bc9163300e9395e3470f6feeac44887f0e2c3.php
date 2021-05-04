<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Shift')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Shift')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Shift')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Shift List')); ?></h4>
                                    <a href="#" data-url="<?php echo e(route('shift.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Create New')); ?>" data-original-title="<?php echo e(__('Create Shift')); ?>">
                                        <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Start Time')); ?></th>
                                            <th><?php echo e(__('End Time')); ?></th>
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><?php echo e($shift->title); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($shift->start_time)->format('h:i A')); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($shift->end_time)->format('h:i A')); ?></td>
                                                <td>
                                                    <a href="#" data-url="<?php echo e(route('shift.edit',$shift->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Termination')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                        <i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span>
                                                    </a>

                                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($shift->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['shift.destroy', $shift->id],'id'=>'delete-form-'.$shift->id]); ?>

                                                    <?php echo Form::close(); ?>

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
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\hrms\resources\views/shift/index.blade.php ENDPATH**/ ?>