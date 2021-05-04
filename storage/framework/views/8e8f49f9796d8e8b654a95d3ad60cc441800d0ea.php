<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Goal Tracking')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Goal Tracking')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Goal Tracking')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Goal Tracking List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Goal Tracking')): ?>
                                        <a href="#" data-url="<?php echo e(route('goaltracking.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-title="<?php echo e(__('Create New Goal Tracking')); ?>">
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
                                            <th><?php echo e(__('Goal Type')); ?></th>
                                            <th><?php echo e(__('Subject')); ?></th>
                                            <th><?php echo e(__('Branch')); ?></th>
                                            <th><?php echo e(__('Target Achievement')); ?></th>
                                            <th><?php echo e(__('Start Date')); ?></th>
                                            <th><?php echo e(__('End Date')); ?></th>
                                            <th width="20%"><?php echo e(__('Progress')); ?></th>
                                            <?php if( Gate::check('Edit Goal Tracking') ||Gate::check('Delete Goal Tracking')): ?>
                                                <th class="text-right" width="200px"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $goalTrackings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goalTracking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><?php echo e(!empty($goalTracking->goalType)?$goalTracking->goalType->name:''); ?></td>
                                                <td><?php echo e($goalTracking->subject); ?></td>
                                                <td><?php echo e(!empty($goalTracking->branches)?$goalTracking->branches->name:''); ?></td>
                                                <td><?php echo e($goalTracking->target_achievement); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($goalTracking->start_date)); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($goalTracking->end_date)); ?></td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" style="width:<?php echo e($goalTracking->progress); ?>%"><?php echo e($goalTracking->progress); ?>%</div>
                                                    </div>
                                                </td>
                                                <?php if( Gate::check('Edit Goal Tracking') ||Gate::check('Delete Goal Tracking')): ?>
                                                    <td class="text-right">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Goal Tracking')): ?>
                                                            <a href="#" data-url="<?php echo e(route('goaltracking.edit',$goalTracking->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Goal Tracking')); ?>" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Goal Tracking')): ?>
                                                            <a href="#" class="btn btn-outline-danger btn-sm" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($goalTracking->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['goaltracking.destroy', $goalTracking->id],'id'=>'delete-form-'.$goalTracking->id]); ?>

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




<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\hrms\resources\views/goaltracking/index.blade.php ENDPATH**/ ?>