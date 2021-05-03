<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('css-page'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fullcalendar/fullcalendar.min.css')); ?>">
    <?php $__env->stopPush(); ?>
    <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    <div class="main-content">
        <section class="section">
            <?php if(\Auth::user()->type == 'employee'): ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Event View')); ?></h4>
                            </div>
                            <div class="card-body dash-card-body">
                                <div class="fc-overflow">
                                    <div id="myEvent"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Mark Attandance')); ?></h4>
                            </div>
                            <div class="card-body dash-card-body">
                                <p class="text-muted pb-0-5"><?php echo e(__('My Office Time: '.$officeTime['startTime'].' to '.$officeTime['endTime'])); ?></p>
                                <center>
                                    <div class="row">
                                        <div class="col-md-6 float-right border-right">
                                            <?php echo e(Form::open(array('url'=>'attendanceemployee/attendance','method'=>'post'))); ?>

                                            <?php if(empty($employeeAttendance) || $employeeAttendance->clock_out != '00:00:00'): ?>
                                                <?php echo e(Form::submit(__('CLOCK IN'),array('class'=>'btn btn-success','name'=>'in','value'=>'0','id'=>'clock_in'))); ?>

                                            <?php else: ?>
                                                <?php echo e(Form::submit(__('CLOCK IN'),array('class'=>'btn btn-success disabled','disabled','name'=>'in','value'=>'0','id'=>'clock_in'))); ?>

                                            <?php endif; ?>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                        <div class="col-md-6 float-left">
                                            <?php if(!empty($employeeAttendance) && $employeeAttendance->clock_out == '00:00:00'): ?>
                                                <?php echo e(Form::model($employeeAttendance,array('route'=>array('attendanceemployee.update',$employeeAttendance->id),'method' => 'PUT'))); ?>

                                                <?php echo e(Form::submit(__('CLOCK OUT'),array('class'=>'btn btn-danger','name'=>'out','value'=>'1','id'=>'clock_out'))); ?>

                                            <?php else: ?>
                                                <?php echo e(Form::submit(__('CLOCK OUT'),array('class'=>'btn btn-danger disabled','name'=>'out','disabled','value'=>'1','id'=>'clock_out'))); ?>

                                            <?php endif; ?>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>
                                </center>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Announcement List')); ?></h4>
                            </div>
                            <div class="card-body dash-card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Start Date')); ?></th>
                                            <th><?php echo e(__('End Date')); ?></th>
                                            <th><?php echo e(__('description')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($announcement->title); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($announcement->start_date)); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($announcement->end_date)); ?></td>
                                                <td><?php echo e($announcement->description); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="text-center">
                                                        <h6><?php echo e(__('there is no announcement')); ?></h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Meeting List')); ?></h4>
                            </div>
                            <div class="card-body dash-card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Meeting title')); ?></th>
                                            <th><?php echo e(__('Meeting Date')); ?></th>
                                            <th><?php echo e(__('Meeting Time')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($meeting->title); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($meeting->date)); ?></td>
                                                <td><?php echo e(\Auth::user()->timeFormat($meeting->time)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="text-center">
                                                        <h6><?php echo e(__('there is no meeting schedule')); ?></h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?php echo e(__('TOTAL STAFF')); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?php echo e($countUser +   $countEmployee); ?>

                                </div>
                            </div>
                            <div class="card-stats">
                                <div class="card-stats-title">
                                    <div class="progreess-status mt-2">
                                        <span><?php echo e(__('USER')); ?> :</span>
                                        <span><strong><?php echo e($countUser); ?> </strong></span>
                                        <span class="float-right"><strong><?php echo e($countEmployee); ?> </strong></span>
                                        <span class="float-right"><?php echo e(__('EMPLOYEE')); ?> :</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?php echo e(__('TOTAL TICKET')); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?php echo e($countTicket); ?>

                                </div>
                            </div>
                            <div class="card-stats">
                                <div class="card-stats-title">
                                    <div class="progreess-status mt-2">
                                        <span><?php echo e(__('OPEN TICKET')); ?> :</span>
                                        <span><strong><?php echo e($countOpenTicket); ?> </strong></span>
                                        <span class="float-right"><strong><?php echo e($countCloseTicket); ?> </strong></span>
                                        <span class="float-right"><?php echo e(__('CLOSE TICKET')); ?> :</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(\Auth::user()->type=='company'): ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-money-bill"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo e(__('ACCOUNT BALANCE')); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e(\Auth::user()->priceFormat($accountBalance)); ?>

                                    </div>
                                </div>
                                <div class="card-stats">
                                    <div class="card-stats-title">
                                        <div class="progreess-status mt-2">
                                            <span><?php echo e(__('PAYEE')); ?> :</span>
                                            <span><strong><?php echo e($totalPayer); ?> </strong></span>
                                            <span class="float-right"><strong><?php echo e($totalPayer); ?> </strong></span>
                                            <span class="float-right"><?php echo e(__('PAYER')); ?> :</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Todays Not Clock In')); ?></h4>
                            </div>
                            <div class="card-body dash-card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('Status')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $notClockIns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notClockIn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($notClockIn->name); ?></td>
                                                <td>
                                                    <div class="badge badge-danger"><a href="#" class="text-white"><?php echo e(__('Absent')); ?></a></div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="text-center">
                                                        <h6><?php echo e(__('there is no todays not clock in')); ?></h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Announcement List')); ?></h4>
                            </div>
                            <div class="card-body dash-card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Start Date')); ?></th>
                                            <th><?php echo e(__('End Date')); ?></th>
                                            <th><?php echo e(__('description')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($announcement->title); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($announcement->start_date)); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($announcement->end_date)); ?></td>
                                                <td><?php echo e($announcement->description); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="text-center">
                                                        <h6><?php echo e(__('there is no announcement')); ?></h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Event View')); ?></h4>
                            </div>
                            <div class="card-body dash-card-body">
                                <div class="fc-overflow">
                                    <div id="myEvent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Meeting Schedule')); ?></h4>
                            </div>
                            <div class="card-body dash-card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Date')); ?></th>
                                            <th><?php echo e(__('Time')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($meeting->title); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($meeting->date)); ?></td>
                                                <td><?php echo e(\Auth::user()->timeFormat($meeting->time)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="text-center">
                                                        <h6><?php echo e(__('there is no meeting schedule')); ?></h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </div>

    <?php $__env->startPush('script-page'); ?>
        <script src="<?php echo e(asset('assets/modules/fullcalendar/fullcalendar.min.js')); ?>"></script>
        <script>
            var arrEvents =<?php echo $arrEvents; ?>

        </script>
        <script src="<?php echo e(asset('assets/js/page/modules-calendar.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/dashboard/dashboard.blade.php ENDPATH**/ ?>