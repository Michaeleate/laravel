<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mod_schedule extends Model
{
    protected $fillable = [
        'rec_id',
        'job_id',
        'sch_id',
        'schedule_start',
        'schedule_end',
        'schedule_at',
        'schedule_byuser',
        'schedule_byrec',
        'schedule_stat',
        'schedule_msg',
        'interview_type',
        'interview_round',
        'interview_stat',
        'interview_msg',
        'approve'
    ];
    protected $table = 'schedule';
}
