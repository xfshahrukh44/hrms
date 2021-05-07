<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AllowanceOption;

class AllowanceOption extends Model
{
    protected $fillable = [
        'name',
        'created_by',
    ];

    public function get_name($id)
    {
        return (AllowanceOption::find($id))->name;
    }
}
