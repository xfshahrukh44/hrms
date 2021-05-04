<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Assets')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Assets')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Assets')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Assets List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Assets')): ?>
                                        <a href="#" data-url="<?php echo e(route('account-assets.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Create Assets')); ?>">
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
                                            <th> <?php echo e(__('Name')); ?></th>
                                            <th> <?php echo e(__('Purchase Date')); ?></th>
                                            <th> <?php echo e(__('Support Until')); ?></th>
                                            <th> <?php echo e(__('Amount')); ?></th>
                                            <th> <?php echo e(__('Description')); ?></th>
                                            <?php if(Gate::check('Edit Assets') || Gate::check('Delete Assets')): ?>
                                                <th class="text-right"> <?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="font-style"><?php echo e($asset->name); ?></td>
                                                <td class="font-style"><?php echo e(\Auth::user()->dateFormat($asset->purchase_date)); ?></td>
                                                <td class="font-style"><?php echo e(\Auth::user()->dateFormat($asset->supported_date)); ?></td>
                                                <td class="font-style"><?php echo e(\Auth::user()->priceFormat($asset->amount)); ?></td>
                                                <td class="font-style"><?php echo e($asset->description); ?></td>
                                                <?php if(Gate::check('Edit Assets') || Gate::check('Delete Assets')): ?>
                                                    <td class="action text-right">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Assets')): ?>
                                                            <a href="#" class="btn btn-outline-primary btn-sm mr-1" data-url="<?php echo e(route('account-assets.edit',$asset->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Assets')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                                <i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span>
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Assets')): ?>
                                                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($asset->id); ?>').submit();">
                                                                <i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span>
                                                            </a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['account-assets.destroy', $asset->id],'id'=>'delete-form-'.$asset->id]); ?>

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

<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function () {
            $('.daterangepicker').daterangepicker({
                format: 'yyyy-mm-dd',
                locale: {format: 'YYYY-MM-DD'},
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\hrms\resources\views/assets/index.blade.php ENDPATH**/ ?>