<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Termination')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Termination')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Termination')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Termination List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Termination')): ?>
                                        <a href="#" data-url="<?php echo e(route('termination.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Create New Termination')); ?>" data-original-title="<?php echo e(__('Create Termination')); ?>">
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
                                            <?php if(auth()->check() && auth()->user()->hasRole('company')): ?>
                                            <th><?php echo e(__('Employee Name')); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo e(__('Termination Type')); ?></th>
                                            <th><?php echo e(__('Notice Date')); ?></th>
                                            <th><?php echo e(__('Termination Date')); ?></th>
                                            <th><?php echo e(__('Description')); ?></th>
                                            <?php if(Gate::check('Edit Termination') || Gate::check('Delete Termination')): ?>
                                                <th class="text-right" width="200px"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $terminations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $termination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php if(auth()->check() && auth()->user()->hasRole('company')): ?>
                                                <td><?php echo e(!empty($termination->employee())?$termination->employee()->name:''); ?></td>
                                                <?php endif; ?>

                                                <td><?php echo e(!empty($termination->terminationType())?$termination->terminationType()->name:''); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($termination->notice_date)); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($termination->termination_date)); ?></td>
                                                <td><?php echo e($termination->description); ?></td>
                                                <?php if(Gate::check('Edit Termination') || Gate::check('Delete Termination')): ?>
                                                    <td class="text-right">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Termination')): ?>
                                                            <a href="#" data-url="<?php echo e(URL::to('termination/'.$termination->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Termination')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Termination')): ?>
                                                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($termination->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['termination.destroy', $termination->id],'id'=>'delete-form-'.$termination->id]); ?>

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


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/termination/index.blade.php ENDPATH**/ ?>