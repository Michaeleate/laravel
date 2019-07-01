<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mod_services extends Model
{
    protected $fillable = [
        'user_id',
        'rec_id',
        'serv_id',
        'credit_id',
        'serv_type',
        'serv_startdt',
        'serv_enddt',
        'servstat',
        'servmsg',
    ];
    protected $table = 'services';
}
