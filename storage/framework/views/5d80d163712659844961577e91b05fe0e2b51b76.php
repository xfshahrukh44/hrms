<?php echo e(Form::model($resignation,array('route' => array('resignation.update', $resignation->id), 'method' => 'PUT'))); ?>

<div class="card-body p-0">
    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('employee_id', __('Employee'))); ?>

            <?php echo e(Form::select('employee_id', $employees,null, array('class' => 'form-control select2','required'=>'required'))); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('notice_date',__('Notice Date'))); ?>

            <?php echo e(Form::date('notice_date',null,array('class'=>'form-control'))); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('resignation_date',__('Resignation Date'))); ?>

            <?php echo e(Form::text('resignation_date',null,array('class'=>'form-control datepicker'))); ?>

        </div>
        <div class="form-group col-lg-12">
            <?php echo e(Form::label('description',__('Description'))); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))); ?>

        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/resignation/edit.blade.php ENDPATH**/ ?>