<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modresuload extends Model
{
    protected $fillable = [
        'resu_id',
        'oldresu',
        'newresu',
        'resupath',        
    ];
    protected $table = 'resuload';
}
