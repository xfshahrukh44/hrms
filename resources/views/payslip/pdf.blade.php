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
                                <td width="1%"></td>
                                <td class="text-right" colspan="2">
                                    <address style="margin-top:10px">
                                        <div class="col-md-6 float-right">
                                            <img src="{{$logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')}}" alt=""><br>
                                            <p style="margin: 0rem;">{{\Utility::getValByName('company_address')}} , {{\Utility::getValByName('company_city')}}, {{\Utility::getValByName('company_state')}}-{{\Utility::getValByName('company_zipcode')}}</p>
                                            <div style="font-weight: bold;"> {{__('Salary Slip')}} - {{ \Auth::user()->dateFormat( $payslip->salary_month)}}</div>
                                        </div>
                                    </address>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div id="details">
                            <div class="scope-entry">
                                <div class="title">{{__('Employee Name')}} : {{$employee->name}}</div>
                                <div class="title">{{__('Designation')}} : {{($employee->designation) ? ($employee->designation->name) : null}}</div>
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
                                    <table class="" width="100%" height="100%">
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
                                        <!-- allowances -->
                                        @if(count($allowances) > 0)
                                            @php $option = new \App\AllowanceOption(); @endphp
                                            @foreach($allowances as $allowance)
                                                <tr class="entry">
                                                    <td class="value">{{ $option->get_name($allowance->allowance_option) . ' | ' . $allowance->title }}</td>
                                                    <td class="value">
                                                            <div>{{ \Auth::user()->priceFormat($allowance->amount)}}</div>
                                                            @php   $totalEarning+=$allowance->amount @endphp
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <!-- commissions -->
                                        @if(count($commissions) > 0)
                                            @foreach($commissions as $commission)
                                                <tr class="entry">
                                                    <td class="value">{{$commission->title}}</td>
                                                    <td class="value">
                                                        <div>{{ \Auth::user()->priceFormat($commission->amount)}}</div>
                                                        @php   $totalEarning+=$commission->amount @endphp
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <!-- other payment -->
                                        @if(count($other_payments) > 0)
                                            @foreach($other_payments as $payment)
                                                <tr class="entry">
                                                    <td class="value">{{$payment->title}}</td>
                                                    <td class="value">
                                                        <div>{{ \Auth::user()->priceFormat($payment->amount)}}</div>
                                                        @php   $totalEarning+=$payment->amount @endphp
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <!-- overtime -->
                                        @if(count($overtimes) > 0)
                                            @foreach($overtimes as $overtime)
                                                <tr class="entry">
                                                    <td class="value">{{$overtime->title}}</td>
                                                    <td class="value">
                                                        <div>{{ \Auth::user()->priceFormat($overtime->rate)}}</div>
                                                        @php   $totalEarning+=$overtime->rate @endphp
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </td>
                                <td class="right-panel">
                                    <table class="" width="100%" height="100%">
                                        <thead>
                                        <tr class="employee">
                                            <th class="name text-center" colspan="2" style="border-bottom: 1px solid #ccc;">{{__('Deduction')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="details">
                                        <!-- deductions -->
                                        @if(count($allowances) > 0)
                                            @php $option = new \App\DeductionOption(); @endphp
                                            @foreach($saturation_deductions as $deduction)
                                                <tr class="entry">
                                                    <td class="value">{{ $option->get_name($deduction->deduction_option) . ' | ' . $deduction->title }}</td>
                                                    <td class="value">
                                                        <div>{{ \Auth::user()->priceFormat($deduction->amount) }}</div>
                                                        @php   $totalDiduction+=$deduction->amount @endphp
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <!-- loans -->
                                        @if(count($loans) > 0)
                                            @php $option = new \App\LoanOption(); @endphp
                                            @foreach($loans as $loan)
                                                <tr class="entry">
                                                    <td class="value">{{ $option->get_name($loan->loan_option) . ' | ' . $loan->title }}</td>
                                                    <td class="value">
                                                        <div>{{ \Auth::user()->priceFormat($loan->amount)}}</div>
                                                        @php   $totalDiduction+=$loan->amount @endphp
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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

                <!-- <div class="row">
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
                </div> -->
                <div class="col-md-12 text-center">
                    <small><strong>This is a system-generated pay slip. No signature required.</strong></small>
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
