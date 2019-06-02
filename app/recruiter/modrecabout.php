<?php

namespace App\recruiter;

use Illuminate\Database\Eloquent\Model;

class modrecabout extends Model
{
    protected $fillable = [
        'rec_id',
        'profname',
        'profurl',
        'shortprof',
        'charges',
        'servcity',
        'servstate',        
        'servcountry',        
        'remote',        
    ];
    protected $table = 'recabout';
}
