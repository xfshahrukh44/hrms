<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('TimeSheet')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage TimeSheet')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('TimeSheet')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('TimeSheet List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create TimeSheet')): ?>
                                        <a href="#" data-url="<?php echo e(route('timesheet.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Create New')); ?>" data-original-title="<?php echo e(__('Create TimeSheet')); ?>">
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
                                            <?php if(\Auth::user()->type!='employee'): ?>
                                                <th><?php echo e(__('Employee')); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo e(__('Date')); ?></th>
                                            <th><?php echo e(__('Hours')); ?></th>
                                            <th><?php echo e(__('Description')); ?></th>
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $timeSheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeSheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <?php if(\Auth::user()->type!='employee'): ?>
                                                    <td><?php echo e(!empty(\Auth::user()->getUSerEmployee($timeSheet->employee_id))?\Auth::user()->getUSerEmployee($timeSheet->employee_id)->name:''); ?></td>
                                                <?php endif; ?>
                                                <td><?php echo e(\Auth::user()->dateFormat($timeSheet->date)); ?></td>
                                                <td><?php echo e($timeSheet->hours); ?></td>
                                                <td><?php echo e($timeSheet->remark); ?></td>
                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete TimeSheet')): ?>
                                                        <a href="#" data-url="<?php echo e(route('timesheet.edit',$timeSheet->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Termination')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                            <i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete TimeSheet')): ?>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($timeSheet->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['timesheet.destroy', $timeSheet->id],'id'=>'delete-form-'.$timeSheet->id]); ?>

                                                        <?php echo Form::close(); ?>

                                                    <?php endif; ?>
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


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/timeSheet/index.blade.php ENDPATH**/ ?>