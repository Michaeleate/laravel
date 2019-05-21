<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modresuref extends Model
{
    protected $fillable = [
        'ref_id',
        'refnum',
        'fname',
        'location',
        'email',
        'mobnum'
    ];
    protected $table = 'resuref';
}