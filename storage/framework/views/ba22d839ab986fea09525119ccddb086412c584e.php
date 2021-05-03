<ul>
    <?php if(count($messages) > 0): ?>
        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($message->from != Auth::user()->id): ?>
                <li class="left">
                    <?php echo e($message->message); ?>

                </li>
            <?php else: ?>
                <li class="right">
                    <?php echo e($message->message); ?>

                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <li><?php echo e(__('No Message Found..!')); ?></li>
    <?php endif; ?>
</ul>
<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/chats/message.blade.php ENDPATH**/ ?>