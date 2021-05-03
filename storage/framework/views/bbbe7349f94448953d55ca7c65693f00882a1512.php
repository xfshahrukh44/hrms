<?php echo Form::open(['route' => 'user.store','method' => 'post']); ?>

<?php echo csrf_field(); ?>
<div class="row">
    <div class="form-group col-lg-6 col-md-6">
        <?php echo Form::label('name', 'Name'); ?>

        <?php echo Form::text('name', null, ['class' => 'form-control','required' => 'required']); ?>

    </div>

    <div class="form-group col-lg-6 col-md-6">
        <?php echo Form::label('email', 'Email'); ?>

        <?php echo Form::text('email', null, ['class' => 'form-control','required' => 'required']); ?>

    </div>
    <div class="form-group col-lg-6 col-md-6">
        <?php echo Form::label('password', 'Password'); ?>

        <?php echo Form::password('password', ['class' => 'form-control','required' => 'required']); ?>

    </div>

    <?php if(\Auth::user()->type != 'super admin'): ?>
        <div class="form-group col-lg-6 col-md-6 ">
            <?php echo e(Form::label('role', __('User Role'))); ?>

            <?php echo Form::select('role', $roles, null,array('class' => 'form-control select2','required'=>'required')); ?>

            <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-role" role="alert">
                <strong class="text-danger"><?php echo e($message); ?></strong>
        </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    <?php endif; ?>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
<?php echo Form::close(); ?>


<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/user/create.blade.php ENDPATH**/ ?>