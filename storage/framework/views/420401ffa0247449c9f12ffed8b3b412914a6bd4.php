<?php echo e(Form::open(array('url'=>'transfer','method'=>'post'))); ?>

<div class="card-body p-0">
    <div class="row">
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('employee_id', __('Employee'))); ?>

            <?php echo e(Form::select('employee_id', $employees,null, array('class' => 'form-control select2','required'=>'required'))); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('branch_id',__('Branch'))); ?>

            <?php echo e(Form::select('branch_id',$branches,null,array('class'=>'form-control select2'))); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('department_id',__('Department'))); ?>

            <?php echo e(Form::select('department_id',$departments,null,array('class'=>'form-control select2'))); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('transfer_date',__('Transfer Date'))); ?>

            <?php echo e(Form::text('transfer_date',null,array('class'=>'form-control datepicker'))); ?>

        </div>
        <div class="form-group col-lg-12">
            <?php echo e(Form::label('description',__('Description'))); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))); ?>

        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/transfer/create.blade.php ENDPATH**/ ?>