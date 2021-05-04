<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DeductionOption;

class DeductionOption extends Model
{
    protected $fillable = [
        'name',
        'created_by',
    ];

    public function get_name($id)
    {
        return (DeductionOption::find($id))->name;
    }
}
