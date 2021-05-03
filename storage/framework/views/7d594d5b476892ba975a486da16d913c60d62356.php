<?php echo e(Form::open(array('url'=>'document','method'=>'post'))); ?>

<div class="card-body p-0">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('name',__('Name'))); ?>

                <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Document Name')))); ?>

                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-name" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('is_required', __('Required Field'))); ?>

                <select class="form-control select2" required name="is_required">
                    <option value="0"><?php echo e(__('Not Required')); ?></option>
                    <option value="1"><?php echo e(__('Is Required')); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/document/create.blade.php ENDPATH**/ ?>