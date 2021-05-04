<?php echo e(Form::open(array('url'=>'ticket','method'=>'post'))); ?>

<div class="card-body p-0">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('title',__('Subject'))); ?>

                <?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Ticket Subject')))); ?>

            </div>
        </div>
    </div>
    <?php if(\Auth::user()->type!='employee'): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo e(Form::label('employee_id',__('Ticket for Employee'))); ?>

                    <?php echo e(Form::select('employee_id',$employees,null,array('class'=>'form-control select2','placeholder'=>__('Select Employee')))); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('priority',__('Priority'))); ?>

                <select name="priority" id="" class="form-control select2">
                    <option value="low"><?php echo e(__('Low')); ?></option>
                    <option value="medium"><?php echo e(__('Medium')); ?></option>
                    <option value="high"><?php echo e(__('High')); ?></option>
                    <option value="critical"><?php echo e(__('critical')); ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('end_date',__('End Date'))); ?>

                <?php echo e(Form::text('end_date',null,array('class'=>'form-control datepicker'))); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('description',__('Description'))); ?>

                <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Ticket Description')))); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp2\htdocs\hrms\resources\views/ticket/create.blade.php ENDPATH**/ ?>