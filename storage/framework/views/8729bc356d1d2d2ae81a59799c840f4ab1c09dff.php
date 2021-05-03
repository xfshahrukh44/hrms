<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Payslip')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Employee Salary')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#"><?php echo e(__('Home')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Employee Salary')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Pay Slip')): ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between w-100">
                                        <h4><?php echo e(__('Employee Select Month Salary')); ?></h4>

                                        <?php echo e(Form::open(array('route'=>array('payslip.store'),'method'=>'POST','class'=>'w-50 float-left'))); ?>

                                        <div class="float-left col-4">
                                            <?php echo e(Form::select('month',$month,null,array('class'=>'form-control month select2' ))); ?>

                                        </div>
                                        <div class="float-left col-4">
                                            <?php echo e(Form::select('year',$year,null,array('class'=>'form-control year select2' ))); ?>

                                        </div>
                                        <?php echo Form::submit('Genrate Payslip', ['class' => 'btn btn-primary btn-lg float-right search']); ?>

                                        <?php echo Form::close(); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Employee Salary')); ?></h4>
                                    <div class="float-right col-4">
                                        <select class="form-control month_date select2" name="year" tabindex="-1" aria-hidden="true">
                                            <option value="--">--</option>
                                            <?php $__currentLoopData = $month; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$mon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>"><?php echo e($mon); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="float-right col-4">
                                        <?php echo e(Form::select('year',$year,null,array('class'=>'form-control year_date select2' ))); ?>

                                    </div>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Pay Slip')): ?>
                                        <a href="#" class="btn btn-sm btn-primary mr-2 ml-2 pt-2" id="bulk_payment"><?php echo e(__('Bulk Payment')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0" id="dataTable1">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Id')); ?></th>
                                            <th><?php echo e(__('Employee Id')); ?></th>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('Payroll Type')); ?></th>
                                            <th><?php echo e(__('Salary')); ?></th>
                                            <th><?php echo e(__('Net Salary')); ?></th>
                                            <th><?php echo e(__('Status')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>

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
    <?php $__env->startPush('script-page'); ?>
        <script type="text/javascript">

            var table = $('#dataTable1').DataTable({
                "aoColumnDefs": [
                    {
                        "aTargets": [6],
                        "mData": null,
                        "mRender": function (data, type, full) {
                            var month = $(".month_date").val();
                            var year = $(".year_date").val();
                            var datePicker = year + '-' + month;
                            var id = data[0];

                            if (data[6] == 'Paid')
                                return '<div class="badge badge-success"><a href="#" class="text-white">' + data[6] + '</a></div>';
                            else
                                return '<div class="badge badge-danger"><a  href="#" class="text-white">' + data[6] + '</a></div>';
                        }
                    },
                    {
                        "aTargets": [7],
                        "mData": null,
                        "mRender": function (data, type, full) {
                            var month = $(".month_date").val();
                            var year = $(".year_date").val();
                            var datePicker = year + '-' + month;

                            var id = data[0];

                            var clickToPaid = '';
                            var payslip = '<a data-url="<?php echo e(url('payslip/pdf/')); ?>/' + id + '/' + datePicker + '" data-size="md-pdf"  data-ajax-popup="true" data-toggle="tooltip" class="btn btn-sm btn-warning btn-round btn-icon text-white" data-title="<?php echo e(__('Payslip')); ?>" data-original-title="<?php echo e(__('Payslip')); ?>">' + '<?php echo e(__('Payslip')); ?>' + '</a> ';

                            if (data[6] == "UnPaid") {
                                clickToPaid = '<a href="<?php echo e(url('payslip/paysalary/')); ?>/' + id + '/' + datePicker + '"  class="btn btn-sm btn-success btn-round btn-icon text-white">' + '<?php echo e(__('Click To Paid')); ?>' + '</a>  ';
                            }
                            return '<a data-url="<?php echo e(url('payslip/showemployee/')); ?>/' + id + '"  data-ajax-popup="true" data-toggle="tooltip" class="btn btn-sm btn-info btn-round btn-icon text-white" data-title="<?php echo e(__('View Employee Detail')); ?>" data-original-title="<?php echo e(__('View Employee Detail')); ?>">' + '<?php echo e(__('View')); ?>' + '</a>  ' + payslip + clickToPaid
                        }
                    },
                ]
            });


            function callback() {
                var month = $(".month_date").val();
                var year = $(".year_date").val();
                var datePicker = year + '-' + month;

                $.ajax({
                    url: '<?php echo e(route('payslip.search_json')); ?>',
                    type: 'POST',
                    data: {
                        "datePicker": datePicker, "_token": "<?php echo e(csrf_token()); ?>",
                    },
                    success: function (data) {
                        table.rows().remove().draw();
                        table.rows.add(data).draw();
                        table.column(0).visible(false);

                        if (!(data)) {
                            show_msg('error', 'Payslip Not Found!', 'error');
                        }
                    },
                    error: function (data) {

                    }
                });
            }

            $(document).on("change", ".month_date,.year_date", function () {
                callback();
            });


            //bulkpayment Click
            $(document).on("click", "#bulk_payment", function () {
                var month = $(".month_date").val();
                var year = $(".year_date").val();
                var datePicker = year + '_' + month;

            });

            $(document).on('click', '#bulk_payment', 'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]', function () {
                var month = $(".month_date").val();
                var year = $(".year_date").val();
                var datePicker = year + '-' + month;

                var title = 'Bulk Payment';
                var size = 'md';
                var url = 'payslip/bulk_pay_create/' + datePicker;

                // return false;

                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);
                $.ajax({
                    url: url,
                    success: function (data) {
                        console.log('here data' + data);
                        // alert(data);
                        // return false;
                        if (data.length) {
                            $('#commonModal .modal-body').html(data);
                            $("#commonModal").modal('show');
                            // common_bind();
                        } else {
                            show_msg('Error', 'Permission denied.');
                            $("#commonModal").modal('hide');
                        }
                    },
                    error: function (data) {
                        data = data.responseJSON;
                        show_msg('Error', data.error);
                    }
                });
            });


        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/payslip/index.blade.php ENDPATH**/ ?>