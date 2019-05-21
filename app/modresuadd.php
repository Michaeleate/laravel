<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modresuadd extends Model
{
    protected $fillable = [
        'add_id',
        'addtype',
        'addline1',
        'addline2',
        'city',
        'state',
        'zcode',
        'country'
    ];
    protected $table = 'resuadd';
}