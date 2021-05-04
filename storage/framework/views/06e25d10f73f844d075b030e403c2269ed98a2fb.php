<?php echo e(Form::model($timeSheet, array('route' => array('timesheet.update', $timeSheet->id), 'method' => 'PUT'))); ?>

<div class="row">
    <?php if(\Auth::user()->type != 'employee'): ?>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('employee_id', __('Employee'))); ?>

            <?php echo Form::select('employee_id', $employees, null,array('class' => 'form-control font-style select2','required'=>'required')); ?>

        </div>
    <?php endif; ?>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('date', __('Date'))); ?>

        <?php echo e(Form::text('date',null, array('class' => 'form-control datepicker','required'=>'required'))); ?>

    </div>
    <!-- <div class="form-group col-md-6">
        <?php echo e(Form::label('hours', __('Hours'))); ?>

        <?php echo e(Form::number('hours',null, array('class' => 'form-control','required'=>'required','step'=>'0.01'))); ?>

    </div> -->
    <div class="form-group col-md-6">
        <?php echo e(Form::label('shift_id', __('Shift'))); ?>

        <?php echo Form::select('shift_id', $shifts, null,array('class' => 'form-control font-style select2','required'=>'required')); ?>

    </div>
</div>
<div class="row">
    <div class="form-group  col-md-12">
        <?php echo e(Form::label('remark', __('Remark'))); ?>

        <?php echo Form::textarea('remark', null, ['class'=>'form-control','rows'=>'2']); ?>

    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>


<?php /**PATH C:\xampp2\htdocs\hrms\resources\views/timeSheet/edit.blade.php ENDPATH**/ ?>