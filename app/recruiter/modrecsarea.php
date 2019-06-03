<?php

namespace App\recruiter;

use Illuminate\Database\Eloquent\Model;

class modrecsarea extends Model
{
    protected $fillable = [
        'rec_id',
        'sarea1',
        'sarea2',
        'sarea3',
        'sainfo',
        'sapos',
        'saclients',
    ];
    protected $table = 'recsarea';
}
