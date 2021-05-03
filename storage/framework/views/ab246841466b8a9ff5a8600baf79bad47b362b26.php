<?php echo e(Form::open(array('url'=>'payslip/bulkpayment/'.$date,'method'=>'post'))); ?>

<div class="card-body p-0">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(__('Total Unpaid Employee')); ?> <b><?php echo e(count($unpaidEmployees)); ?></b> <?php echo e(_('out of')); ?> <b><?php echo e(count($Employees)); ?></b>
            </div>

        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Bulk Payment'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/payslip/bulkcreate.blade.php ENDPATH**/ ?>