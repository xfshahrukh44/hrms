<table class="table table-striped mb-0">
    <tr>
        <th><?php echo e(__('Basic Salary')); ?></th>
        <td><?php echo e(\Auth::user()->priceFormat( $payslip->basic_salary)); ?></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <th><?php echo e(__('Payroll Month')); ?></th>
        <td><?php echo e(\Auth::user()->dateFormat( $payslip->salary_month)); ?></td>
        <td>&nbsp;</td>
    </tr>
</table>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4">
                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="home-tab4" data-toggle="tab" href="#allowance" role="tab" aria-controls="home" aria-selected="true"><?php echo e(__('Allowance')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#commission" role="tab" aria-controls="profile" aria-selected="false"><?php echo e(__('Commission')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#loan" role="tab" aria-controls="contact" aria-selected="false"><?php echo e(__('Loan')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#deduction" role="tab" aria-controls="contact" aria-selected="false"><?php echo e(__('Saturation Deduction')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#payment" role="tab" aria-controls="contact" aria-selected="false"><?php echo e(__('Other Payment')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#overtime" role="tab" aria-controls="contact" aria-selected="false"><?php echo e(__('Overtime')); ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-8">
                <div class="tab-content no-padding" id="myTab2Content">
                    <div class="tab-pane fade active show" id="allowance" role="tabpanel" aria-labelledby="home-tab4">
                        <?php
                            $allowances = json_decode($payslip->allowance);
                        ?>
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                            </tr>
                            <?php $__currentLoopData = $allowances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allownace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($allownace->title); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($allownace->amount)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="commission" role="tabpanel" aria-labelledby="home-tab4">
                        <?php
                            $commissions = json_decode($payslip->commission);
                        ?>
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                            </tr>
                            <?php $__currentLoopData = $commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($commission->title); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($commission->amount)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="loan" role="tabpanel" aria-labelledby="home-tab4">
                        <?php
                            $loans = json_decode($payslip->loan);
                        ?>
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                            </tr>
                            <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loan->title); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($loan->amount)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="deduction" role="tabpanel" aria-labelledby="home-tab4">
                        <?php
                            $saturation_deductions = json_decode($payslip->saturation_deduction);
                        ?>
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                            </tr>
                            <?php $__currentLoopData = $saturation_deductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($deduction->title); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($deduction->amount)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="home-tab4">
                        <?php
                            $other_payments = json_decode($payslip->other_payment);
                        ?>
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                            </tr>
                            <?php $__currentLoopData = $other_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($payment->title); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($payment->amount)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="overtime" role="tabpanel" aria-labelledby="home-tab4">
                        <?php
                            $overtimes = json_decode($payslip->overtime);
                        ?>
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                            </tr>
                            <?php $__currentLoopData = $overtimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $overtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($overtime->title); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($overtime->rate)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table table-striped mb-0">
    <tr>
        <th><?php echo e(__('Net Salary')); ?></th>
        <td><?php echo e(\Auth::user()->priceFormat($payslip->net_payble)); ?></td>
        <td>&nbsp;</td>
    </tr>
</table>
<?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/payslip/show.blade.php ENDPATH**/ ?>