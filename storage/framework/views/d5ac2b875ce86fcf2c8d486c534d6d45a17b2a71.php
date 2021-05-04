<?php $__env->startSection('content'); ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Employee Set Salary')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Employee Set Salary')); ?></div>
                </div>
            </div>

            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Employee Salary')); ?></h4></div>
                                <div class="card-body">
                                    <div class="project-info d-flex">
                                        <div class="project-info-inner mr-3 col-6">
                                            <b class="m-0"> <?php echo e(__('Payslip Type')); ?> </b>
                                            <div class="project-amnt pt-1"><?php echo e($employee->salary_type()); ?></div>
                                        </div>
                                        <div class="project-info-inner mr-3 col-6">
                                            <b class="m-0"> <?php echo e(__('Salary')); ?> </b>
                                            <div class="project-amnt pt-1"><?php echo e($employee->salary); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Allowance')); ?></h4></div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th><?php echo e(__('Employee Name')); ?></th>
                                                <th><?php echo e(__('Allownace Option')); ?></th>
                                                <th><?php echo e(__('Title')); ?></th>
                                                <th><?php echo e(__('Amount')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $allowances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allowance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(!empty($allowance->employee())?$allowance->employee()->name:''); ?></td>
                                                    <td><?php echo e(!empty($allowance->allowance_option())?$allowance->allowance_option()->name:''); ?></td>
                                                    <td><?php echo e($allowance->title); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($allowance->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Commission')); ?></h4></div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th><?php echo e(__('Employee Name')); ?></th>
                                                <th><?php echo e(__('Title')); ?></th>
                                                <th><?php echo e(__('Amount')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(!empty($commission->employee())?$commission->employee()->name:''); ?></td>
                                                    <td><?php echo e($commission->title); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat( $commission->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Loan')); ?></h4></div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th><?php echo e(__('employee')); ?></th>
                                                <th><?php echo e(__('Loan Options')); ?></th>
                                                <th><?php echo e(__('Title')); ?></th>
                                                <th><?php echo e(__('Loan Amount')); ?></th>
                                                <th><?php echo e(__('Start Date')); ?></th>
                                                <th><?php echo e(__('End Date')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(!empty($loan->employee())?$loan->employee()->name:''); ?></td>
                                                    <td><?php echo e(!empty( $loan->loan_option())? $loan->loan_option()->name:''); ?></td>
                                                    <td><?php echo e($loan->title); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($loan->amount)); ?></td>
                                                    <td><?php echo e(\Auth::user()->dateFormat($loan->start_date)); ?></td>
                                                    <td><?php echo e(\Auth::user()->dateFormat( $loan->end_date)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Saturation Deduction')); ?></h4></div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th><?php echo e(__('Employee Name')); ?></th>
                                                <th><?php echo e(__('Deduction Option')); ?></th>
                                                <th><?php echo e(__('Title')); ?></th>
                                                <th><?php echo e(__('Amount')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $saturationdeductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saturationdeduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(!empty($saturationdeduction->employee())?$saturationdeduction->employee()->name:''); ?></td>
                                                    <td><?php echo e(!empty($saturationdeduction->deduction_option())?$saturationdeduction->deduction_option()->name:''); ?></td>
                                                    <td><?php echo e($saturationdeduction->title); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat( $saturationdeduction->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Other Payment')); ?></h4></div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th><?php echo e(__('employee')); ?></th>
                                                <th><?php echo e(__('Title')); ?></th>
                                                <th><?php echo e(__('Amount')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $otherpayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherpayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(!empty($otherpayment->employee())?$otherpayment->employee()->name:''); ?></td>
                                                    <td><?php echo e($otherpayment->title); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($otherpayment->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Overtime')); ?></h4></div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th><?php echo e(__('Employee Name')); ?></th>
                                                <th><?php echo e(__('Overtime Title')); ?></th>
                                                <th><?php echo e(__('Number of days')); ?></th>
                                                <th><?php echo e(__('Hours')); ?></th>
                                                <th><?php echo e(__('Rate')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $overtimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $overtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(!empty($overtime->employee())?$overtime->employee()->name:''); ?></td>
                                                    <td><?php echo e($overtime->title); ?></td>
                                                    <td><?php echo e($overtime->number_of_days); ?></td>
                                                    <td><?php echo e($overtime->hours); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($overtime->rate)); ?></td>
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
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>

    <script type="text/javascript">

        $(document).ready(function () {
            var d_id = $('#department_id').val();
            var designation_id = '<?php echo e($employee->designation_id); ?>';
            getDesignation(d_id);


            $("#allowance-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });

            $("#commission-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });

            $("#loan-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });

            $("#saturation-deduction-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });

            $("#other-payment-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });

            $("#overtime-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });
        });

        $(document).on('change', 'select[name=department_id]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        function getDesignation(did) {
            $.ajax({
                url: '<?php echo e(route('employee.json')); ?>',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value="">Select any Designation</option>');
                    $.each(data, function (key, value) {
                        var select = '';
                        if (key == '<?php echo e($employee->designation_id); ?>') {
                            select = 'selected';
                        }

                        $('#designation_id').append('<option value="' + key + '"  ' + select + '>' + value + '</option>');
                    });
                }
            });
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\hrms\resources\views/setsalary/employee_salary.blade.php ENDPATH**/ ?>