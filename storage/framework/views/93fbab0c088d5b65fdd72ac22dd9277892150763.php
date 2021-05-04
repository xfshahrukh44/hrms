<?php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
?>
<div class="col-md-12">
    <div class="panel panel-bd">
        <div class="panel title text-right mb-3">
            <a href="#" class="btn btn-warning" onclick="saveAsPDF()"><span class="fa fa-download"></span></a>
            <a title="Mail Send" href="<?php echo e(route('payslip.send',[$employee->id,$payslip->salary_month])); ?>" class="btn btn-primary"><span class="fa fa-paper-plane"></span></a>
        </div>

        <div id="printableArea">
            <div class="panel-body font-style" id="payslip">
                <div class="row" style="border-bottom:1px solid #ccc;">
                    <div class="col-sm-12">
                        <table>
                            <tbody>
                            <tr>
                                <td width="1%"></td>
                                <td class="text-right" colspan="2">
                                    <address style="margin-top:10px">
                                        <div class="col-md-6 float-right">
                                            <img src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')); ?>" alt=""><br>
                                            <p style="margin: 0rem;"><?php echo e(\Utility::getValByName('company_address')); ?> , <?php echo e(\Utility::getValByName('company_city')); ?>, <?php echo e(\Utility::getValByName('company_state')); ?>-<?php echo e(\Utility::getValByName('company_zipcode')); ?></p>
                                            <div style="font-weight: bold;"> <?php echo e(__('Salary Slip')); ?> - <?php echo e(\Auth::user()->dateFormat( $payslip->salary_month)); ?></div>
                                        </div>
                                    </address>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div id="details">
                            <div class="scope-entry">
                                <div class="title"><?php echo e(__('Employee Name')); ?> : <?php echo e($employee->name); ?></div>
                                <div class="title"><?php echo e(__('Designation')); ?> : <?php echo e(($employee->designation) ? ($employee->designation->name) : null); ?></div>
                                <div class="title"><?php echo e(__('Salary Date')); ?> : <?php echo e(\Auth::user()->dateFormat( $employee->created_at)); ?></div>
                            </div>
                        </div>
                        <?php
                            $allowances = json_decode($payslip->allowance);
                            $commissions = json_decode($payslip->commission);
                              $loans = json_decode($payslip->loan);
                              $saturation_deductions = json_decode($payslip->saturation_deduction);
                               $other_payments = json_decode($payslip->other_payment);
                                  $overtimes = json_decode($payslip->overtime);
                                  $totalEarning=0;
                                  $totalDiduction=0;

                       $totalEarning+= $payslip->basic_salary;
                        ?>
                        <table class="table salary-info">
                            <tbody>
                            <tr>
                                <td class="left-panel" style="border-right: 1px solid #ccc;">
                                    <table class="" width="100%" height="100%">
                                        <thead>
                                        <tr class="employee">
                                            <th class="name text-center" colspan="2" style="border-bottom: 1px solid #ccc;"><?php echo e(__('Earnings')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="details">
                                        <tr class="entry">
                                            <td class="value"><?php echo e(__('Basic Salary')); ?></td>
                                            <td class="value">
                                                <div><?php echo e(\Auth::user()->priceFormat( $payslip->basic_salary)); ?></div>
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value"><?php echo e(__('Allowance')); ?></td>
                                            <td class="value">
                                                <?php $__currentLoopData = $allowances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allownace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div><?php echo e(\Auth::user()->priceFormat($allownace->amount)); ?></div>
                                                    <?php   $totalEarning+=$allownace->amount ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value"><?php echo e(__('Commission')); ?></td>
                                            <td class="value">
                                                <?php $__currentLoopData = $commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div><?php echo e(\Auth::user()->priceFormat($commission->amount)); ?></div>
                                                    <?php   $totalEarning+=$commission->amount ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value"><?php echo e(__('Other Payment')); ?></td>
                                            <td class="value">
                                                <?php $__currentLoopData = $other_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div><?php echo e(\Auth::user()->priceFormat($payment->amount)); ?></div>
                                                    <?php   $totalEarning+=$payment->amount ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value"><?php echo e(__('Overtime')); ?></td>
                                            <td class="value">
                                                <?php $__currentLoopData = $overtimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $overtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div><?php echo e(\Auth::user()->priceFormat($overtime->rate)); ?></div>
                                                    <?php   $totalEarning+=$overtime->rate ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="right-panel">
                                    <table class="" width="100%" height="100%">
                                        <thead>
                                        <tr class="employee">
                                            <th class="name text-center" colspan="2" style="border-bottom: 1px solid #ccc;"><?php echo e(__('Deduction')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="details">
                                        <tr class="entry">
                                            <td class="value"><?php echo e(__('Saturation Deduction')); ?></td>
                                            <td class="value">
                                                <?php $__currentLoopData = $saturation_deductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div><?php echo e(\Auth::user()->priceFormat($deduction->amount)); ?></div>
                                                    <?php   $totalDiduction+=$deduction->amount ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value"><?php echo e(__('Loan')); ?></td>
                                            <td class="value">
                                                <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div><?php echo e(\Auth::user()->priceFormat($loan->amount)); ?></div>
                                                    <?php   $totalDiduction+=$loan->amount ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                        </tr>
                                        <?php
                                            $option = new \App\DeductionOption()
                                        ?>
                                        <?php $__currentLoopData = $saturation_deductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="entry">
                                                <td class="value"><?php echo e($option->get_name($deduction->deduction_option) . ' | ' . $deduction->title); ?></td>
                                                <td class="value">
                                                    <div><?php echo e(\Auth::user()->priceFormat($deduction->amount)); ?></div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12 pb-5 mt-3">
                    <div class="row">
                        <div class="col-sm-12 text-right" style="float:left;font-weight: bold;">
                            <?php echo e(__('Net Salary')); ?> : <?php echo e(\Auth::user()->priceFormat($payslip->net_payble)); ?>

                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-sm-6">
                        <div style="float:left;text-align:center;border-top:1px solid #e4e5e7;font-weight: bold;">
                            <p class="mt-2"><?php echo e(__('Employee Signature')); ?></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div style="float:right;text-align:center;border-top:1px solid #e4e5e7;font-weight: bold;">
                            <p class="mt-2"> <?php echo e(__('Paid By')); ?></p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo e(asset('js/html2pdf.bundle.min.js')); ?>"></script>
<script>

    function saveAsPDF() {
        var element = document.getElementById('printableArea');
        var opt = {
            margin: 0.3,
            filename: '<?php echo e($employee->name); ?>',
            image: {type: 'jpeg', quality: 1},
            html2canvas: {scale: 4, dpi: 72, letterRendering: true},
            jsPDF: {unit: 'in', format: 'A4'}
        };
        html2pdf().set(opt).from(element).save();
    }

</script>
<?php /**PATH C:\xampp2\htdocs\hrms\resources\views/payslip/pdf.blade.php ENDPATH**/ ?>