<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mod_credits extends Model
{
    protected $fillable = [
        'user_id',
        'rec_id',
        'credit_id',
        'intrans_id',
        'credits',
        'credit_type',
        'status',
    ];
    protected $table = 'credits';
}
