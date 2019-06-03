<?php

namespace App\recruiter;

use Illuminate\Database\Eloquent\Model;

class modrecref extends Model
{
    protected $fillable = [
        'rec_id',
        'refnum',
        'fname',
        'location',
        'email',
        'mobnum'
    ];
    protected $table = 'recref';
}
