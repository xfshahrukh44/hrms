<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class PayslipSend extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $payslip;
    public $month;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payslip, $month)
    {
        $this->payslip = $payslip;
        $this->month = Carbon::parse($month)->format('M Y');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.payslip_send')->with('payslip', $this->payslip)->subject('82 Solutions - Payslip ' . $this->month);
    }
}
