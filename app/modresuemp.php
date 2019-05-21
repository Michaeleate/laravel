<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modresuemp extends Model
{
    protected $fillable = [
        'emp_id',
        'emp_name',
        'desg',
        'startdt',
        'enddt',
        'msal',
        'resp',
        'nperiod',
    ];
    protected $table = 'resuemp';
}
