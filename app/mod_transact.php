<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mod_transact extends Model
{
    protected $fillable = [
        'intrans_id',
        'extrans_id',
        'trans_type',
        'trans_amnt',
        'prod_id',
        'prod_info',
        'trans_with',
        'trans_validto',
        'trans_stat',
        'trans_msg',
        'trans_byuser',
        'trans_byrec',
    ];
    protected $table = 'transact';
}
