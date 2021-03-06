<?php echo e(Form::open(array('route' => array('timesheet.store')))); ?>

<div class="row">
    <?php if(\Auth::user()->type != 'employee'): ?>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('employee_id', __('Employee'))); ?>

            <?php echo Form::select('employee_id', $employees, null,array('class' => 'form-control font-style select2','required'=>'required')); ?>

        </div>
    <?php endif; ?>
    <div class="form-group col-md-4">
        <?php echo e(Form::label('date', __('Date'))); ?>

        <?php echo e(Form::text('date', '', array('class' => 'form-control datepicker','required'=>'required'))); ?>

    </div>
    <div class="form-group col-md-4">
        <?php echo e(Form::label('date_to', __('Date'))); ?>

        <?php echo e(Form::text('date_to', '', array('class' => 'form-control datepicker','required'=>'required'))); ?>

    </div>
    <div class="form-group col-md-4">
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
        <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp2\htdocs\hrms\resources\views/timeSheet/create.blade.php ENDPATH**/ ?>