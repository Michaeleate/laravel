<?php

namespace App\recruiter;

use Illuminate\Database\Eloquent\Model;

class modrecpdet extends Model
{
    protected $fillable = [
        'rec_id',
        'fname',
        'lname',
        'location',
        'email',
        'mobnum',        
        'skype',        
        'picname',        
        'picpath',        
    ];
    protected $table = 'recpdet';
}
