<?php

namespace App\recruiter;

use Illuminate\Database\Eloquent\Model;

class modrecsocio extends Model
{
    protected $fillable = [
        'rec_id',
        'linkurl',
        'fburl',
        'tweeturl',
        'instaurl',
        'lang1',
        'lang2',
        'lang3',
    ];
    protected $table = 'recsocio';
}
