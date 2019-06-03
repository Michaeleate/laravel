<?php

namespace App\recruiter;

use Illuminate\Database\Eloquent\Model;

class modrecemp extends Model
{
    protected $fillable = [
        'rec_id',
        'emp_name',
        'desg',
        'startdt',
        'enddt',
        'msal',
        'resp',
        'nperiod',
    ];
    protected $table = 'recemp';
}
