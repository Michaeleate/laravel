<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modresuedu extends Model
{
    protected $fillable = [
        'edu_id',
        'qual',
        'board',
        'course',
        'spec',
        'colname',
        'district',
        'cortype',
        'pyear',
        'edulang',
        'percentage',
    ];
    protected $table = 'resuedu';
}
