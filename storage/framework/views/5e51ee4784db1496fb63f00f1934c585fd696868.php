
<?php
    $logo=asset(Storage::url('uploads/logo/'));
 $company_logo=Utility::getValByName('company_logo');
 $company_small_logo=Utility::getValByName('company_small_logo');
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
                <img class="img-fluid" src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')); ?>" alt="" width="">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo e(route('home')); ?>">
                <img class="img-fluid" src="<?php echo e($logo.'/'.(isset($company_small_logo) && !empty($company_small_logo)?$company_small_logo:'small_logo.png')); ?>" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown <?php echo e(request()->is('home*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('home')); ?>"> <i class="fas fa-tachometer-alt"></i> <span><?php echo e(__('Dashboard')); ?></span></a>
            </li>

            <?php if(\Auth::user()->type=='super admin'): ?>
                <li class="dropdown ">
                <li class="<?php echo e(request()->is('user*') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('user.index')); ?>"><i class="fas fa-user"></i><?php echo e(__('Company')); ?></a></li>
                </li>
            <?php else: ?>
                <?php if( Gate::check('Manage User') || Gate::check('Manage Role') || Gate::check('Manage Employee Profile')  || Gate::check('Manage Employee Last Login')): ?>
                    <li class="dropdown <?php echo e((Request::route()->getName() == 'user.index' || Request::route()->getName() == 'roles.index' || Request::route()->getName() == 'permissions.index' || Request::route()->getName() == 'employee.profile' || Request::route()->getName() == 'lastlogin') ? 'active' : ''); ?>">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span><?php echo e(__('Staff')); ?></span></a>
                        <ul class="dropdown-menu">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage User')): ?>
                                <li class="<?php echo e(request()->is('user*') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('user.index')); ?>"><?php echo e(__('User')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Role')): ?>
                                <li class="<?php echo e(request()->is('roles*') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('roles.index')); ?>"><?php echo e(__('Role')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Employee Profile')): ?>
                                <li class="<?php echo e(request()->is('employee-profile') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('employee.profile')); ?>"><?php echo e(__('Employee Profile')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Employee Last Login')): ?>
                                <li class="<?php echo e(request()->is('lastlogin') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('lastlogin')); ?>"><?php echo e(__('Last Login')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(Gate::check('Manage Employee')): ?>
                <?php if(\Auth::user()->type =='employee'): ?>
                    <?php
                        $employee=App\Employee::where('user_id',\Auth::user()->id)->first();
                    ?>
                    <li class="<?php echo e(request()->is('employee*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('employee.show',\Illuminate\Support\Facades\Crypt::encrypt($employee->id))); ?>"><i class="fas fa-users"></i> <span><?php echo e(__('Employee')); ?></span></a>
                    </li>
                <?php else: ?>
                    <li class="<?php echo e((Request::route()->getName() == 'employee.index') ||  (Request::route()->getName() == 'employee.create') ||  (Request::route()->getName() == 'employee.edit') ||  (Request::route()->getName() == 'employee.show') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('employee.index')); ?>"><i class="fas fa-users"></i> <span><?php echo e(__('Employee')); ?></span></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(Gate::check('Manage Set Salary') || Gate::check('Manage Pay Slip')): ?>
                <li class="<?php echo e((Request::route()->getName() == 'setsalary.index' || Request::route()->getName() == 'setsalary.show' ||  Request::route()->getName() == 'payslip.index' || Request::route()->getName() == 'payslip.employeepayslip' || Request::route()->getName() == 'setsalary.edit' || Request::route()->getName() == 'employeesalary' || Request::route()->getName() == 'payslip.employeepayslip' || Request::route()->getName() == 'payslip.pdf') ? 'active' : ''); ?>">
                    <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-receipt"></i> <span><?php echo e(__('Payroll')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Set Salary')): ?>
                            <li class="<?php echo e(request()->is('setsalary*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('setsalary.index')); ?>"><?php echo e(__('Set Salary')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Pay Slip')): ?>
                            <li class="<?php echo e(request()->is('payslip*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('payslip.index')); ?>"><?php echo e(__('Payslip')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type=='employee'): ?>
                <li class="<?php echo e((Request::route()->getName() == 'employeesalary' || Request::route()->getName() == 'payslip.employeepayslip' ||  Request::route()->getName() == 'setsalary.show') ? 'active' : ''); ?>">
                    <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-receipt"></i> <span><?php echo e(__('Payroll')); ?></span></a>
                    <ul class="dropdown-menu">
                        <li class="<?php echo e((Request::segment(2) == 'employeeSalary' || Request::segment(1) == 'setsalary') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('employeesalary')); ?>"><?php echo e(__('My Salary')); ?></a>
                        </li>
                        <li class="<?php echo e((Request::segment(2) == 'employeepayslip') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('payslip.employeepayslip')); ?>"><?php echo e(__('Payslip')); ?></a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if( Gate::check('Manage Attendance') || Gate::check('Manage Leave') || Gate::check('Manage TimeSheet')): ?>
                <li class="dropdown <?php echo e((Request::route()->getName() == 'attendanceemployee.index' || Request::route()->getName() == 'leave.index'  || Request::route()->getName() == 'timesheet.index') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span><?php echo e(__('Timesheet')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage TimeSheet')): ?>
                            <li class="<?php echo e(request()->is('timesheet*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('timesheet.index')); ?>"><?php echo e(__('Timesheet')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Attendance')): ?>
                            <li class="<?php echo e(request()->is('attendanceemployee*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('attendanceemployee.index')); ?>"><?php echo e(__('Attendance')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Leave')): ?>
                            <li class="<?php echo e(request()->is('leave*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('leave.index')); ?>"><?php echo e(__('Manage Leave')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(Gate::check('Manage Indicator') || Gate::check('Manage Appraisal') || Gate::check('Manage Goal Tracking')): ?>
                <li class="<?php echo e((Request::route()->getName() == 'indicator.index' || Request::route()->getName() == 'appraisal.index' || Request::route()->getName() == 'goaltracking.index') ? 'active' : ''); ?>">
                    <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fa fa-cube"></i> <span><?php echo e(__('Performance')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Indicator')): ?>
                            <li class="<?php echo e(request()->is('indicator*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('indicator.index')); ?>"><?php echo e(__('Indicator')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Appraisal')): ?>
                            <li class="<?php echo e(request()->is('appraisal*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('appraisal.index')); ?>"><?php echo e(__('Appraisal')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Goal Tracking')): ?>
                            <li class="<?php echo e(request()->is('goaltracking*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('goaltracking.index')); ?>"><?php echo e(__('Goal Tracking')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(Gate::check('Manage Account List') || Gate::check('Manage Payee')  || Gate::check('Manage Payer')  || Gate::check('Manage Deposit') || Gate::check('Manage Expense') || Gate::check('Manage Transfer Balance')): ?>
                <li class="<?php echo e((Request::route()->getName() == 'accountlist.index' || Request::route()->getName() == 'accountbalance' || Request::route()->getName() == 'payees.index' || Request::route()->getName() == 'payer.index' || Request::route()->getName() == 'deposit.index' || Request::route()->getName() == 'expense.index' || Request::route()->getName() == 'transferbalance.index' || Request::route()->getName() == 'viewtransaction.index') ? 'active' : ''); ?>">
                    <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-wallet"></i> <span><?php echo e(__('Finance')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Account List')): ?>
                            <li class="<?php echo e(request()->is('accountlist*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('accountlist.index')); ?>"><?php echo e(__('Account List')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View Balance Account List')): ?>
                            <li class="<?php echo e(request()->is('accountbalance*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('accountbalance')); ?>"><?php echo e(__('Account Balance')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payee')): ?>
                            <li class="<?php echo e(request()->is('payees*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('payees.index')); ?>"><?php echo e(__('Payees')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payer')): ?>
                            <li class="<?php echo e(request()->is('payer*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('payer.index')); ?>"><?php echo e(__('Payers')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Deposit')): ?>
                            <li class="<?php echo e(request()->is('deposit*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('deposit.index')); ?>"><?php echo e(__('Deposit')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Expense')): ?>
                            <li class="<?php echo e(request()->is('expense*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('expense.index')); ?>"><?php echo e(__('Expense')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Transfer Balance')): ?>
                            <li class="<?php echo e(request()->is('transferbalance*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('transferbalance.index')); ?>"><?php echo e(__('Transfer Balance')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(Gate::check('Manage Trainer') || Gate::check('Manage Training')): ?>
                <li class="<?php echo e((Request::route()->getName() == 'trainer.index' || Request::route()->getName() == 'training.index' || Request::route()->getName() == 'training.show') ? 'active' : ''); ?>">
                    <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fa fa-graduation-cap"></i> <span><?php echo e(__('Training')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Training')): ?>
                            <li class="<?php echo e(request()->is('training*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('training.index')); ?>"><?php echo e(__('Training List')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Trainer')): ?>
                            <li class="<?php echo e(request()->is('trainer*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('trainer.index')); ?>"><?php echo e(__('Trainer')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(Gate::check('Manage Awards') || Gate::check('Manage Transfer')  || Gate::check('Manage Resignation')  || Gate::check('Manage Travels') || Gate::check('Manage Promotion') || Gate::check('Manage Complaint')|| Gate::check('Manage Warning') || Gate::check('Manage Termination') || Gate::check('Manage Announcement')): ?>
                <li class="dropdown <?php echo e((Request::route()->getName() == 'award.index' ||  Request::route()->getName() == 'transfer.index' || Request::route()->getName() == 'resignation.index' || Request::route()->getName() == 'travel.index' ||  Request::route()->getName() == 'promotion.index' || Request::route()->getName() == 'complaint.index' || Request::route()->getName() == 'warning.index' || Request::route()->getName() == 'termination.index' || Request::route()->getName() == 'announcement.index') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-cog"></i> <span><?php echo e(__('HR')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Award')): ?>
                            <li class="<?php echo e(request()->is('award*') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('award.index')); ?>"><?php echo e(__('Award')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Transfer')): ?>
                            <li class="<?php echo e(request()->is('transfer*') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('transfer.index')); ?>"><?php echo e(__('Transfer')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Resignation')): ?>
                            <li class="<?php echo e(request()->is('resignation*') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('resignation.index')); ?>"><?php echo e(__('Resignation')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Travel')): ?>
                            <li class="<?php echo e(request()->is('travel*') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('travel.index')); ?>"><?php echo e(__('Trip')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Promotion')): ?>
                            <li class="<?php echo e(request()->is('promotion*') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('promotion.index')); ?>"><?php echo e(__('Promotion')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Complaint')): ?>
                            <li class="<?php echo e(request()->is('complaint*') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('complaint.index')); ?>"><?php echo e(__('Complaints')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Warning')): ?>
                            <li class="<?php echo e(request()->is('warning*') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('warning.index')); ?>"><?php echo e(__('Warning')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Termination')): ?>
                            <li class="<?php echo e(request()->is('termination*') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('termination.index')); ?>"><?php echo e(__('Termination')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Announcement')): ?>
                            <li class="<?php echo e(request()->is('announcement*') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('announcement.index')); ?>"><?php echo e(__('Announcement')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(Auth::user()->type != 'super admin'): ?>
                <li class="<?php echo e((Request::route()->getName() == 'chats') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('chats')); ?>"><i class="fas fa-comments"></i> <span><?php echo e(__('Chats')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Ticket')): ?>
                <li class="<?php echo e(request()->is('ticket*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('ticket.index')); ?>"><i class="fas fa-ticket-alt"></i> <span><?php echo e(__('Ticket')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Event')): ?>
                <li class="<?php echo e(request()->is('event*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('event.index')); ?>"><i class="fas fa-calendar-alt"></i> <span><?php echo e(__('Event')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Meeting')): ?>
                <li class="<?php echo e(request()->is('meeting*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('meeting.index')); ?>"><i class="fas fa-handshake"></i> <span><?php echo e(__('Meeting')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(Gate::check('Manage Assets')): ?>
                <li class="<?php echo e((Request::segment(1) == 'account-assets')?'active':''); ?>">
                    <a class="nav-link" href="<?php echo e(route('account-assets.index')); ?>">
                        <i class="fa fa-calculator"></i> <span><?php echo e(__('Assets')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(Gate::check('Manage Document')): ?>
                <li class="<?php echo e((Request::segment(1) == 'document-upload')?'active':''); ?>">
                    <a class="nav-link" href="<?php echo e(route('document-upload.index')); ?>">
                        <i class="fa fa-file"></i> <span><?php echo e(__('Document')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(Gate::check('Manage Company Policy')): ?>
                <li class="<?php echo e((Request::segment(1) == 'company-policy')?'active':''); ?>">
                    <a class="nav-link" href="<?php echo e(route('company-policy.index')); ?>"><i class="fa fa-pray"></i><span><?php echo e(__('Company Policy')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(Gate::check('Manage Plan')): ?>
                <li class="<?php echo e(request()->is('plans*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('plans.index')); ?>"><i class="fas fa-trophy"></i> <span><?php echo e(__('Plan')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(Gate::check('manage coupon')): ?>
                <li class="<?php echo e((Request::segment(1) == 'coupons')?'active':''); ?>">
                    <a class="nav-link" href="<?php echo e(route('coupons.index')); ?>"><i class="fas fa-gift"></i><span><?php echo e(__('Coupon')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(Gate::check('Manage Order')): ?>
                <li class="<?php echo e(request()->is('orders*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('order.index')); ?>"><i class="fas fa-cart-plus"></i> <span><?php echo e(__('Order')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(Gate::check('Manage Report')): ?>
                <li class="dropdown <?php echo e((Request::route()->getName() == 'report.income-expense' || Request::route()->getName() == 'report.leave' || Request::route()->getName() == 'report.account.statement' || Request::route()->getName() == 'report.payroll' || Request::route()->getName() == 'report.monthly.attendance' || Request::route()->getName() == 'report.daily.attendance' || Request::route()->getName() == 'report.timesheet' ) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span><?php echo e(__('Report')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Report')): ?>
                            <li class="<?php echo e(request()->is('report/income-expense') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('report.income-expense')); ?>"><?php echo e(__('Income Vs Expense')); ?></a>
                            </li>
                            <li class="<?php echo e(request()->is('report/leave') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('report.leave')); ?>"><?php echo e(__('Leave')); ?></a>
                            </li>
                            <li class="<?php echo e(request()->is('report/account-statement') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('report.account.statement')); ?>"><?php echo e(__('Account Statement')); ?></a>
                            </li>
                            <li class="<?php echo e(request()->is('report/payroll') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('report.payroll')); ?>"><?php echo e(__('Payroll')); ?></a>
                            </li>
                            <li class="<?php echo e(request()->is('report/daily/attendance') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('report.daily.attendance')); ?>"><?php echo e(__('Daily Attendance')); ?></a>
                            </li>
                            <li class="<?php echo e(request()->is('report/monthly/attendance') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('report.monthly.attendance')); ?>"><?php echo e(__('Monthly Attendance')); ?></a>
                            </li>
                            <li class="<?php echo e(request()->is('report/timesheet') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('report.timesheet')); ?>"><?php echo e(__('Timesheet')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if(Gate::check('Manage Department') || Gate::check('Manage Designation')  || Gate::check('Manage Document Type')  || Gate::check('Manage Branch') || Gate::check('Manage Award Type') || Gate::check('Manage Termination Types')|| Gate::check('Manage Payslip Type') || Gate::check('Manage Allowance Option') || Gate::check('Manage Loan Options')  || Gate::check('Manage Deduction Options') || Gate::check('Manage Expense Type')  || Gate::check('Manage Income Type') || Gate::check('Manage
             Payment Type')  || Gate::check('Manage Leave Type') || Gate::check('Manage Training Type')): ?>
                <li class="dropdown <?php echo e((Request::route()->getName() == 'department.index' || Request::route()->getName() == 'designation.index' || Request::route()->getName() == 'document.index' || Request::route()->getName() == 'branch.index' || Request::route()->getName() == 'awardtype.index' || Request::route()->getName() == 'terminationtype.index' || Request::route()->getName() == 'paysliptype.index' || Request::route()->getName() == 'allowanceoption.index' || Request::route()->getName() ==
            'loanoption.index' || Request::route()->getName() == 'deductionoption.index' || Request::route()->getName() == 'expensetype.index' || Request::route()->getName() == 'incometype.index'|| Request::route()->getName() == 'paymenttype.index' || Request::route()->getName() == 'leavetype.index' || Request::route()->getName() == 'goaltype.index' || Request::route()->getName() == 'trainingtype.index' || Request::route()->getName() == 'trainingtype.index') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-external-link-alt"></i> <span><?php echo e(__('Constant')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Branch')): ?>
                            <li class="<?php echo e(request()->is('branch*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('branch.index')); ?>"><?php echo e(__('Branch')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Department')): ?>
                            <li class="<?php echo e(request()->is('department*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('department.index')); ?>"><?php echo e(__('Department')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Designation')): ?>
                            <li class="<?php echo e(request()->is('designation*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('designation.index')); ?>"><?php echo e(__('Designation')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Document Type')): ?>
                            <li class="<?php echo e(request()->is('document*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('document.index')); ?>"><?php echo e(__('Document Type')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Award Type')): ?>
                            <li class="<?php echo e(request()->is('awardtype*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('awardtype.index')); ?>"><?php echo e(__('Award Type')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Termination Types')): ?>
                            <li class="<?php echo e(request()->is('terminationtype*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('terminationtype.index')); ?>"><?php echo e(__('Termination Type')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payslip Type')): ?>
                            <li class="<?php echo e(request()->is('paysliptype*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('paysliptype.index')); ?>"><?php echo e(__('Payslip Type')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Allowance Option')): ?>
                            <li class="<?php echo e(request()->is('allowanceoption*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('allowanceoption.index')); ?>"><?php echo e(__('Allowance Option')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Loan Option')): ?>
                            <li class="<?php echo e(request()->is('loanoption*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('loanoption.index')); ?>"><?php echo e(__('Loan Option')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Deduction Option')): ?>
                            <li class="<?php echo e(request()->is('deductionoption*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('deductionoption.index')); ?>"><?php echo e(__('Deduction Option')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Expense Type')): ?>
                            <li class="<?php echo e(request()->is('expensetype*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('expensetype.index')); ?>"><?php echo e(__('Expense Type')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Income Type')): ?>
                            <li class="<?php echo e(request()->is('incometype*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('incometype.index')); ?>"><?php echo e(__('Income Type')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payment Type')): ?>
                            <li class="<?php echo e(request()->is('paymenttype*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('paymenttype.index')); ?>"><?php echo e(__('Payment Type')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Leave Type')): ?>
                            <li class="<?php echo e(request()->is('leavetype*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('leavetype.index')); ?>"><?php echo e(__('Leave Type')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Termination Type')): ?>
                            <li class="<?php echo e(request()->is('terminationtype*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('terminationtype.index')); ?>"><?php echo e(__('Termination Type')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Goal Type')): ?>
                            <li class="<?php echo e(request()->is('goaltype*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('goaltype.index')); ?>"><?php echo e(__('Goal Type')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Training Type')): ?>
                            <li class="<?php echo e(request()->is('trainingtype*') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('trainingtype.index')); ?>"><?php echo e(__('Training Type')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(Gate::check('Manage Company Settings') || Gate::check('Manage System Settings')): ?>
                <li class="<?php echo e(request()->is('settings*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('settings.index')); ?>"><i class="fas fa-sliders-h"></i> <span><?php echo e(__('System Setting')); ?></span></a>
                </li>
            <?php endif; ?>
        </ul>
    </aside>
</div>
<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/partial/Admin/menu.blade.php ENDPATH**/ ?>