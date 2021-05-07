<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    protected $fillable = [
        'employee_id',
        'shift_id',
        'date',
        'date_to',
        'hours',
        'remark',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id', 'employee_id');
    }

    public function employees()
    {
        return $this->belongsTo('App\Employee', 'user_id', 'employee_id');
    }

    public function shift()
    {
        return $this->belongsTo('App\Shift');
    }
}

