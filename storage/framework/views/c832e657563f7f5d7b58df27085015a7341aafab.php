<?php echo e(Form::model($saturationdeduction,array('route' => array('saturationdeduction.update', $saturationdeduction->id), 'method' => 'PUT'))); ?>

<div class="card-body p-0">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('deduction_option', __('Deduction Options*'))); ?>

                <?php echo e(Form::select('deduction_option',$deduction_options,null, array('class' => 'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('title', __('Title'))); ?>

                <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('amount', __('Amount'))); ?>

                <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01'))); ?>

            </div>
        </div>
    </div>

</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>



<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/saturationdeduction/edit.blade.php ENDPATH**/ ?>