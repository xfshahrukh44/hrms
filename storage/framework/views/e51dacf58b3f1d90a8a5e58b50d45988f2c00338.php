<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Payslip Type')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Payslip Type')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Payslip Type')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Payslip Type List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Payslip Type')): ?>
                                        <a href="#" data-url="<?php echo e(route('paysliptype.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Create Payslip Type')); ?>" data-original-title="<?php echo e(__('Create Payslip Type')); ?>">
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
                                            <th><?php echo e(__('Payslip Type')); ?></th>
                                            <th class="text-right" width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $paysliptypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paysliptype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($paysliptype->name); ?></td>

                                                <td class="text-right">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Payslip Type')): ?>
                                                        <a href="#" data-url="<?php echo e(URL::to('paysliptype/'.$paysliptype->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Payslip Type')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Payslip Type')): ?>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($paysliptype->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['paysliptype.destroy', $paysliptype->id],'id'=>'delete-form-'.$paysliptype->id]); ?>

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


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/paysliptype/index.blade.php ENDPATH**/ ?>