<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoanOption;

class LoanOption extends Model
{
    protected $fillable = [
        'name',
        'created_by',
    ];

    public function get_name($id)
    {
        return (LoanOption::find($id))->name;
    }
}
