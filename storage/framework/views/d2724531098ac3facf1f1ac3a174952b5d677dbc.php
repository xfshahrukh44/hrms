<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Employee')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Employee')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(__('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Employee')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Manage Employee')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Employee')): ?>
                                        <a href="<?php echo e(route('employee.create')); ?>" class="btn btn-icon icon-left btn-primary">
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
                                            <th><?php echo e(__('Employee ID')); ?></th>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('Email')); ?></th>
                                            <th><?php echo e(__('Branch')); ?></th>
                                            <th><?php echo e(__('Department')); ?></th>
                                            <th><?php echo e(__('Designation')); ?></th>
                                            <th><?php echo e(__('Date Of Joining')); ?></th>
                                            <?php if(Gate::check('Edit Employee') || Gate::check('Delete Employee')): ?>
                                                <th class="text-right" width="200px"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Employee')): ?>
                                                        <a href="<?php echo e(route('employee.show',\Illuminate\Support\Facades\Crypt::encrypt($employee->id))); ?>" class="btn btn-sm btn-primary"><?php echo e(\Auth::user()->employeeIdFormat($employee->employee_id)); ?></a>
                                                    <?php else: ?>
                                                        <a href="#" class="btn btn-sm btn-primary"><?php echo e(\Auth::user()->employeeIdFormat($employee->employee_id)); ?></a>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="font-style"><?php echo e($employee->name); ?></td>
                                                <td><?php echo e($employee->email); ?></td>
                                                <td class="font-style"><?php echo e(!empty(\Auth::user()->getBranch($employee->branch_id ))?\Auth::user()->getBranch($employee->branch_id )->name:''); ?></td>
                                                <td class="font-style"><?php echo e(!empty(\Auth::user()->getDepartment($employee->department_id ))?\Auth::user()->getDepartment($employee->department_id )->name:''); ?></td>
                                                <td class="font-style"><?php echo e(!empty(\Auth::user()->getDesignation($employee->designation_id ))?\Auth::user()->getDesignation($employee->designation_id )->name:''); ?></td>
                                                <td class="font-style"><?php echo e(\Auth::user()->dateFormat($employee->company_doj )); ?></td>
                                                <?php if(Gate::check('Edit Employee') || Gate::check('Delete Employee')): ?>
                                                    <td class="text-right">
                                                        <?php if($employee->is_active==1): ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Employee')): ?>
                                                                
                                                                <a href="<?php echo e(route('employee.edit',\Illuminate\Support\Facades\Crypt::encrypt($employee->id))); ?>" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                            <?php endif; ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Employee')): ?>
                                                                <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($employee->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['employee.destroy', $employee->id],'id'=>'delete-form-'.$employee->id]); ?>

                                                                <?php echo Form::close(); ?>

                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <i class="fas fa-lock"></i>
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



<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\hrms\resources\views/employee/index.blade.php ENDPATH**/ ?>