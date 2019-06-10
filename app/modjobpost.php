<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modjobpost extends Model
{
    protected $fillable = [
        'rec_id',
        'job_id',
        'jtitle',
        'jd',
        'qty',
        'keywords',
        'minexp',
        'maxexp',
        'minsal',
        'maxsal',
        'hireloc1',
        'hireloc2',
        'hireloc3',
        'comhirefor',
        'jstatus',
        'valid_till',
        'auto_aprove',
        'auto_upd',
    ];
    protected $table = 'jobpost';
}
