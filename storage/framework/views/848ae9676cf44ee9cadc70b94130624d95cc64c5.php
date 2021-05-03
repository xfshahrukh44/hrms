<?php echo e(Form::open(array('url'=>'document-upload','method'=>'post', 'enctype' => "multipart/form-data"))); ?>

<div class="card-body p-0">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('name',__('Name'))); ?>

                <?php echo e(Form::text('name',null,array('class'=>'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('document',__('Document'))); ?>

                <?php echo e(Form::file('document',null,array('class'=>'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('role',__('Role'))); ?>

                <?php echo e(Form::select('role',$roles,null,array('class'=>'form-control select2'))); ?>

            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('description', __('Description'))); ?>

                <?php echo e(Form::textarea('description',null, array('class' => 'form-control'))); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/documentUpload/create.blade.php ENDPATH**/ ?>