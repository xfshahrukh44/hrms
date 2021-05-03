<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Travel')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Trip')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Trip')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Trip List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Travel')): ?>
                                        <a href="#" data-url="<?php echo e(route('travel.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Create New Trip')); ?>" data-original-title="<?php echo e(__('New Trip')); ?>">
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
                                            <th><?php echo e(__('Start Date')); ?></th>
                                            <th><?php echo e(__('End Date')); ?></th>
                                            <th><?php echo e(__('Purpose of Visit')); ?></th>
                                            <th><?php echo e(__('Place Of Visit')); ?></th>
                                            <th><?php echo e(__('Description')); ?></th>
                                            <?php if(Gate::check('Edit Travel') || Gate::check('Delete Travel')): ?>
                                                <th class="text-right" width="200px"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $travels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $travel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php if(auth()->check() && auth()->user()->hasRole('company')): ?>
                                                <td><?php echo e(!empty($travel->employee())?$travel->employee()->name:''); ?></td>
                                                <?php endif; ?>
                                                <td><?php echo e(\Auth::user()->dateFormat( $travel->start_date)); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat( $travel->end_date)); ?></td>
                                                <td><?php echo e($travel->purpose_of_visit); ?></td>
                                                <td><?php echo e($travel->place_of_visit); ?></td>
                                                <td><?php echo e($travel->description); ?></td>
                                                <?php if(Gate::check('Edit Travel') || Gate::check('Delete Travel')): ?>
                                                    <td class="text-right">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Travel')): ?>
                                                            <a href="#" data-url="<?php echo e(URL::to('travel/'.$travel->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Trip')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit Trip')); ?>"><i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit ')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Travel')): ?>
                                                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($travel->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['travel.destroy', $travel->id],'id'=>'delete-form-'.$travel->id]); ?>

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


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/travel/index.blade.php ENDPATH**/ ?>