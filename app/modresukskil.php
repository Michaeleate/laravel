<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modresukskil extends Model
{
    protected $fillable = [
        'kskil_id',
        'kskil1',
        'kskil2',
        'kskil3',
        'kskil4',
        'kskil5',
    ];
    protected $table = 'resukskil';
    public $timestamps = true;
}
