<?php echo e(Form::open(array('route' => array('shift.store')))); ?>

<div class="row">

    <div class="form-group col-md-12">
        <?php echo e(Form::label('title', __('Title'))); ?>

        <?php echo e(Form::text('title', '', array('class' => 'form-control title','required'=>'required'))); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('start_time', __('Start Time'))); ?>

        <?php echo e(Form::time('start_time', '', array('class' => 'form-control start_time','required'=>'required'))); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('end_time', __('End Time'))); ?>

        <?php echo e(Form::time('end_time', '', array('class' => 'form-control end_time','required'=>'required'))); ?>

    </div>

</div>
<div class="row">
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp2\htdocs\hrms\resources\views/shift/create.blade.php ENDPATH**/ ?>