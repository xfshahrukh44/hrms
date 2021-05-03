@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
@endphp
<div class="col-md-12">
    <div class="panel panel-bd">
        <div class="panel title text-right mb-3">
            <a href="#" class="btn btn-warning" onclick="saveAsPDF()"><span class="fa fa-download"></span></a>
            <a title="Mail Send" href="{{route('payslip.send',[$employee->id,$payslip->salary_month])}}" class="btn btn-primary"><span class="fa fa-paper-plane"></span></a>
        </div>

        <div id="printableArea">
            <div class="panel-body font-style" id="payslip">
                <div class="row" style="border-bottom:1px solid #ccc;">
                    <div class="col-sm-12">
                        <table>
                            <tbody>
                            <tr>
                                <td width="1%"><img src="{{$logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')}}" width="250px;" alt=""></td>
                                <td class="text-right" colspan="2">
                                    <address style="margin-top:10px">
                                        <strong style="font-size: 30px; ">{{\Utility::getValByName('company_name')}}</strong><br>
                                        {{\Utility::getValByName('company_address')}} , {{\Utility::getValByName('company_city')}}, {{\Utility::getValByName('company_state')}}-{{\Utility::getValByName('company_zipcode')}}<br>
                                        <span style="font-weight: bold;"> {{__('Salary Slip')}} - {{ \Auth::user()->dateFormat( $payslip->salary_month)}}</span>
                                    </address>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div id="details">
                            <div class="scope-entry">
                                <div class="title">{{__('Employee Name')}} : {{$employee->name}}</div>
                                <div class="title">{{__('Position')}} : {{__('Employee')}}</div>
                                <div class="title">{{__('Salary Date')}} : {{\Auth::user()->dateFormat( $employee->created_at)}}</div>
                            </div>
                        </div>
                        @php
                            $allowances = json_decode($payslip->allowance);
                            $commissions = json_decode($payslip->commission);
                              $loans = json_decode($payslip->loan);
                              $saturation_deductions = json_decode($payslip->saturation_deduction);
                               $other_payments = json_decode($payslip->other_payment);
                                  $overtimes = json_decode($payslip->overtime);
                                  $totalEarning=0;
                                  $totalDiduction=0;

                       $totalEarning+= $payslip->basic_salary;
                        @endphp
                        <table class="table salary-info">
                            <tbody>
                            <tr>
                                <td class="left-panel" style="border-right: 1px solid #ccc;">
                                    <table class="" width="100%">
                                        <thead>
                                        <tr class="employee">
                                            <th class="name text-center" colspan="2" style="border-bottom: 1px solid #ccc;">{{__('Earnings')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="details">
                                        <tr class="entry">
                                            <td class="value">{{__('Basic Salary')}}</td>
                                            <td class="value">
                                                <div>{{  \Auth::user()->priceFormat( $payslip->basic_salary)}}</div>
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value">{{__('Allowance')}}</td>
                                            <td class="value">
                                                @foreach($allowances as $allownace)
                                                    <div>{{ \Auth::user()->priceFormat($allownace->amount)}}</div>
                                                    @php   $totalEarning+=$allownace->amount @endphp
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value">{{__('Commission')}}</td>
                                            <td class="value">
                                                @foreach($commissions as $commission)
                                                    <div>{{ \Auth::user()->priceFormat($commission->amount)}}</div>
                                                    @php   $totalEarning+=$commission->amount @endphp
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value">{{__('Other Payment')}}</td>
                                            <td class="value">
                                                @foreach($other_payments as $payment)
                                                    <div>{{ \Auth::user()->priceFormat($payment->amount)}}</div>
                                                    @php   $totalEarning+=$payment->amount @endphp
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value">{{__('Overtime')}}</td>
                                            <td class="value">
                                                @foreach($overtimes as $overtime)
                                                    <div>{{ \Auth::user()->priceFormat($overtime->rate)}}</div>
                                                    @php   $totalEarning+=$overtime->rate @endphp
                                                @endforeach
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="right-panel">
                                    <table class="" width="100%">
                                        <thead>
                                        <tr class="employee">
                                            <th class="name text-center" colspan="2" style="border-bottom: 1px solid #ccc;">{{__('Deduction')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="details">
                                        <tr class="entry">
                                            <td class="value">{{__('Saturation Deduction')}}</td>
                                            <td class="value">
                                                @foreach($saturation_deductions as $deduction)
                                                    <div>{{ \Auth::user()->priceFormat($deduction->amount)}}</div>
                                                    @php   $totalDiduction+=$deduction->amount @endphp
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value">{{__('Loan')}}</td>
                                            <td class="value">
                                                @foreach($loans as $loan)
                                                    <div>{{ \Auth::user()->priceFormat($loan->amount)}}</div>
                                                    @php   $totalDiduction+=$loan->amount @endphp
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value">-</td>
                                            <td class="value">
                                                <div>-</div>
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value">-</td>
                                            <td class="value">
                                                <div>-</div>
                                            </td>
                                        </tr>
                                        <tr class="entry">
                                            <td class="value">-</td>
                                            <td class="value">
                                                <div>-</div>
                                            </td>
                                        </tr>

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
                            {{__('Net Salary')}} : {{ \Auth::user()->priceFormat($payslip->net_payble)}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div style="float:left;text-align:center;border-top:1px solid #e4e5e7;font-weight: bold;">
                            <p class="mt-2">{{__('Employee Signature')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div style="float:right;text-align:center;border-top:1px solid #e4e5e7;font-weight: bold;">
                            <p class="mt-2"> {{__('Paid By')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
<script>

    function saveAsPDF() {
        var element = document.getElementById('printableArea');
        var opt = {
            margin: 0.3,
            filename: '{{$employee->name}}',
            image: {type: 'jpeg', quality: 1},
            html2canvas: {scale: 4, dpi: 72, letterRendering: true},
            jsPDF: {unit: 'in', format: 'A4'}
        };
        html2pdf().set(opt).from(element).save();
    }

</script>
