<?php

namespace App\recruiter;

use Illuminate\Database\Eloquent\Model;

class modrecedu extends Model
{
    protected $fillable = [
        'rec_id',
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
    protected $table = 'recedu';
}
