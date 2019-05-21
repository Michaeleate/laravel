<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modresuhead extends Model
{
    protected $fillable = [
        'head_id',
        'head_line',
    ];
    protected $table = 'resuhead';
    public $timestamps = true;
}
