<?php

namespace App\recruiter;

use Illuminate\Database\Eloquent\Model;

class modrecbdet extends Model
{
    protected $fillable = [
        'rec_id',
        'orgname',
        'weburl',
        'addline1',
        'addline2',
        'city',
        'state',        
        'country',        
    ];
    protected $table = 'recbdet';
}
