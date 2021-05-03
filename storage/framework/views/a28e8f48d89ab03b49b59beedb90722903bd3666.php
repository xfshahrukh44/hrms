<?php echo e(Form::model($asset, array('route' => array('account-assets.update', $asset->id), 'method' => 'PUT'))); ?>

<div class="row">
    <div class="form-group col-md-6">
        <?php echo e(Form::label('name', __('Name'))); ?>

        <?php echo e(Form::text('name', null, array('class' => 'form-control','required'=>'required'))); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('amount', __('Amount'))); ?>

        <?php echo e(Form::number('amount', null, array('class' => 'form-control','required'=>'required','step'=>'0.01'))); ?>

    </div>

    <div class="form-group  col-md-6">
        <?php echo e(Form::label('purchase_date', __('Purchase Date'))); ?>

        <?php echo e(Form::text('purchase_date',null, array('class' => 'form-control datepicker'))); ?>

    </div>
    <div class="form-group  col-md-6">
        <?php echo e(Form::label('supported_date', __('Support Until'))); ?>

        <?php echo e(Form::text('supported_date',null, array('class' => 'form-control datepicker'))); ?>

    </div>
    <div class="form-group  col-md-12">
        <?php echo e(Form::label('description', __('Description'))); ?>

        <?php echo e(Form::textarea('description', null, array('class' => 'form-control'))); ?>

    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>





<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/assets/edit.blade.php ENDPATH**/ ?>