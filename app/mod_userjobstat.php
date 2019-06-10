<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mod_userjobstat extends Model
{
    protected $fillable = [
        'rec_id',
        'job_id',
        'app_status',
        'applied_at',
        'viewed_at',
        'schedule_id',
        'interview_id',
    ];
    protected $table = 'userjobstat';
}
