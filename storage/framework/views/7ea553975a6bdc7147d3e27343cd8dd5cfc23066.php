<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Chat')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        var receiver_id = '';
        var my_id = "<?php echo e(Auth::user()->id); ?>";

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = false;

            var pusher = new Pusher('<?php echo e(env('PUSHER_APP_KEY')); ?>', {
                cluster: '<?php echo e(env('PUSHER_APP_CLUSTER')); ?>',
                forceTLS: true
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-chat', function (data) {
                /*alert(JSON.stringify(data));*/
                if (my_id == data.from) {
                    $('#' + data.to).click();
                } else if (my_id == data.to) {
                    if (receiver_id == data.from) {
                        // if receiver is selected, reload the selected user ...
                        $('#' + data.from).click();
                    } else {
                        // if receiver is not seleted, add notification for that user
                        var pending = parseInt($('#' + data.from + ' .peroson').find('.pending').html());
                        if (pending) {
                            $('#' + data.from + ' .peroson').find('.pending').html(pending + 1);
                        } else {
                            $('#' + data.from + ' .peroson').append(' <span class="badge badge-pill badge-primary pending">1</span>');
                        }
                    }
                }
            });

            $('.user_chat').click(function () {
                var name = $(this).find('.chat_user').html();
                $('.user_chat').removeClass('active-person');
                $(this).addClass('active-person');
                $(this).find('.pending').remove();

                receiver_id = $(this).attr('id');

                $.ajax({
                    type: "get",
                    url: "<?php echo e(URL::to('/')); ?>/message/" + receiver_id, // need to create this route
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#messages').html(data);
                        $('.chat_head').html(name);
                        scrollToBottomFunc();
                    }
                });
            });

            $(document).on('keyup', '.send-msg-box input', function (e) {
                var message = $(this).val();

                // check if enter key is pressed and message is not null also receiver is selected
                if (e.keyCode == 13 && message != '' && receiver_id != '') {
                    $(this).val(''); // while pressed enter text box will be empty
                    var datastr = "&receiver_id=" + receiver_id + "&message=" + message;
                    $.ajax({
                        type: "post",
                        url: "message",
                        data: datastr,
                        cache: false,
                        success: function (data) {

                        },
                        error: function (jqXHR, status, err) {
                        },
                        complete: function () {
                            scrollToBottomFunc();
                        }
                    });
                }
            });
        });

        // make a function to scroll down auto
        function scrollToBottomFunc() {
            $('.message-wrapper').animate({
                scrollTop: $('.message-wrapper').get(0).scrollHeight
            }, 10);
        }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Chat')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(__('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Chat')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card px-3 pt-3 pb-0">
                            <div class="card-body chat-div-wrap px-3 pb-0">
                                <div class="chat-wrap">
                                    <div class="chat-user">
                                        <div class="chat-persons scrollbar-inner">
                                            <ul class="users">
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="user_chat" id="<?php echo e($user->id); ?>">
                                                        <div class="peroson">
                                                            <img class="avatar-sm rounded-circle mr-3 w-13" src="<?php echo e((!empty($user->avatar))? asset(Storage::url("uploads/avatar".$user->avatar)): asset(Storage::url("uploads/avatar/avatar.png"))); ?>" alt="<?php echo e($user->email); ?>">
                                                            <div>
                                                                <?php if(!empty($user->name)): ?>
                                                                    <h6 class="m-0 chat_user"><?php echo e($user->name); ?></h6><span class="text-muted text-small"><?php echo e($user->email); ?></span>
                                                                <?php else: ?>
                                                                    <h6 class="m-0 chat_user py-2"><?php echo e($user->email); ?></h6>
                                                                <?php endif; ?>
                                                            </div>

                                                            <?php if($user->unread() > 0): ?>
                                                                <span class="badge badge-pill badge-primary pending"><?php echo e($user->unread()); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chat-screen">
                                        <div class="chat-head">
                                            <div class="peroson">
                                                <div>
                                                    <h6 class="m-0 chat_head mt-2"><?php echo e(__('Please Select User')); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-body scrollbar-inner message-wrapper">
                                            <div id="messages">
                                                <div class="text-center pt-5">
                                                    <?php echo e(__('No Message Found..!')); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-footer">
                                            <div class="send-msg-box">
                                                <input type="text" class="form-control" placeholder="<?php echo e(__('Type Message here')); ?>" name="message"/>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/chats/index.blade.php ENDPATH**/ ?>