<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Timesheet')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Timesheet')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Timesheet')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <?php echo e(Form::open(array('route' => array('report.timesheet'),'method'=>'get'))); ?>

                                <div class="row">
                                    <div class="col">
                                        <h5 class="h5 mb-0"><?php echo e(__('Filter')); ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo e(Form::label('start_date',__('Start Date'))); ?>

                                        <?php echo e(Form::date('start_date',isset($_GET['start_date'])?$_GET['start_date']:'',array('class'=>'form-control'))); ?>

                                    </div>
                                    <div class="col-md-2">
                                        <?php echo e(Form::label('end_date',__('End Date'))); ?>

                                        <?php echo e(Form::date('end_date',isset($_GET['end_date'])?$_GET['end_date']:'',array('class'=>'form-control'))); ?>

                                    </div>
                                    <div class="col-md-2">
                                        <?php echo e(Form::label('employee', __('Employee'))); ?>

                                        <?php echo e(Form::select('employee', $employeesList,isset($_GET['employee'])?$_GET['employee']:'', array('class' => 'form-control select2'))); ?>

                                    </div>
                                    <div class="col-auto apply-btn">
                                        <?php echo e(Form::submit(__('Apply'),array('class'=>'btn btn-outline-primary btn-sm'))); ?>

                                        <a href="<?php echo e(route('report.timesheet')); ?>" class="btn btn-outline-danger btn-sm"><?php echo e(__('Reset')); ?></a>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive py-4">
                                    <table class="table table-striped mb-0" id="dataTable">
                                        <thead class="thead-light">
                                        <tr>
                                            <th><?php echo e(__('Employee ID')); ?></th>
                                            <th><?php echo e(__('Employee')); ?></th>
                                            <th><?php echo e(__('Date')); ?></th>
                                            <th><?php echo e(__('Hours')); ?></th>
                                            <th><?php echo e(__('Description')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><a href="<?php echo e(route('employee.show',\Illuminate\Support\Facades\Crypt::encrypt($timesheet->employee_id))); ?>" class="btn btn-sm btn-primary"><?php echo e(\Auth::user()->employeeIdFormat($timesheet->employee_id)); ?></a></td>
                                                <td><?php echo e((!empty($timesheet->employees)) ? $timesheet->employees->name:''); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($timesheet->date)); ?></td>
                                                <td><?php echo e($timesheet->hours); ?></td>
                                                <td><?php echo e($timesheet->remark); ?></td>
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


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/report/timesheet.blade.php ENDPATH**/ ?>