<?php echo e(Form::open(array('url'=>'appraisal','method'=>'post'))); ?>

<div class="card-body p-0">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('branch',__('Branch'))); ?>

                <?php echo e(Form::select('branch',$brances,null,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('employee',__('Employee'))); ?>

                <select class="select2 form-control select2-multiple" id="employee" name="employee" data-toggle="select2" data-placeholder="<?php echo e(__('Select Employee')); ?>" required>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('appraisal_date',__('Select Month'))); ?>

                <?php echo e(Form::text('appraisal_date','', array('class' => 'form-control custom-datepicker'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <h6><?php echo e(__('Technical Competencies')); ?></h6>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?php echo e(Form::label('customer_experience',__('Customer Experience'))); ?>

                <?php echo e(Form::select('customer_experience',$technical,null,array('class'=>'form-control select2'))); ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo e(Form::label('marketing',__('Marketing'))); ?>

                <?php echo e(Form::select('marketing',$technical,null,array('class'=>'form-control select2'))); ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo e(Form::label('administration',__('Administration'))); ?>

                <?php echo e(Form::select('administration',$technical,null,array('class'=>'form-control select2'))); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h6><?php echo e(__('Organizational Competencies')); ?></h6>
            <hr>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo e(Form::label('professionalism',__('Professionalism'))); ?>

                <?php echo e(Form::select('professionalism',$organizational,null,array('class'=>'form-control select2'))); ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo e(Form::label('integrity',__('Integrity'))); ?>

                <?php echo e(Form::select('integrity',$organizational,null,array('class'=>'form-control select2'))); ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo e(Form::label('attendance',__('Attendance'))); ?>

                <?php echo e(Form::select('attendance',$organizational,null,array('class'=>'form-control select2'))); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('remark',__('Remarks'))); ?>

                <?php echo e(Form::textarea('remark',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/appraisal/create.blade.php ENDPATH**/ ?>