<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'title',
        'start_time',
        'end_time',
    ];

    public function time_sheets()
    {
        return $this->hasMany('App\TimeSheet');
    }
}
