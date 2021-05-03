<?php (\App::setLocale( basename(App::getLocale()))); ?>
<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($message->from_data): ?>
        <a href="<?php echo e(route('chats')); ?>" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-avatar">
                <img alt="image" <?php if($message->from_data->avatar): ?> src="<?php echo e(asset('/storage/uploads/avatar/'.$message->from_data->avatar)); ?>" <?php else: ?> src="<?php echo e(asset('storage/uploads/avatar/avatar.png')); ?>" <?php endif; ?> class="rounded-circle"/>
            </div>
            <div class="dropdown-item-desc">
                <b><?php echo e($message->from_data->name); ?></b>
                <p><?php echo $message->message; ?></p>
                <div class="time"><?php echo e($message->created_at->diffForHumans()); ?></div>
            </div>
        </a>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/chats/popup.blade.php ENDPATH**/ ?>