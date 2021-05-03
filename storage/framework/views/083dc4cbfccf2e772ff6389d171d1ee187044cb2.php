<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Trainer')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Trainer')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Trainer')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Trainer List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Trainer')): ?>
                                        <a href="#" data-url="<?php echo e(route('trainer.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-title="<?php echo e(__('Create New Trainer')); ?>">
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
                                            <th><?php echo e(__('Full Name')); ?></th>
                                            <th><?php echo e(__('Contact')); ?></th>
                                            <th><?php echo e(__('Email')); ?></th>
                                            <?php if( Gate::check('Edit Trainer') ||Gate::check('Delete Trainer') ||Gate::check('Show Trainer')): ?>
                                                <th class="text-right" width="200px"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(!empty($trainer->branches)?$trainer->branches->name:''); ?></td>
                                                <td><?php echo e($trainer->firstname .' '.$trainer->lastname); ?></td>
                                                <td><?php echo e($trainer->contact); ?></td>
                                                <td><?php echo e($trainer->email); ?></td>
                                                <?php if( Gate::check('Edit Trainer') ||Gate::check('Delete Trainer') || Gate::check('Show Trainer')): ?>
                                                    <td class="text-right">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Trainer')): ?>
                                                            <a href="#" data-url="<?php echo e(route('trainer.show',$trainer->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Trainer Detail')); ?>" class="btn btn-outline-warning btn-sm mr-1"><i class="fas fa-eye"></i> <span><?php echo e(__('Show')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Trainer')): ?>
                                                            <a href="#" data-url="<?php echo e(route('trainer.edit',$trainer->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Trainer')); ?>" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Trainer')): ?>
                                                            <a href="#" class="btn btn-outline-danger btn-sm" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($trainer->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['trainer.destroy', $trainer->id],'id'=>'delete-form-'.$trainer->id]); ?>

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




<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/trainer/index.blade.php ENDPATH**/ ?>