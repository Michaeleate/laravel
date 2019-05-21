<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modresupdet extends Model
{
    protected $fillable = [
        'pdet_id',
        'fname',
        'email',
        'mob_num',        
        'gender',
        'dob',        
        'marstat',        
        'eng_lang',        
        'tel_lang',        
        'hin_lang',        
        'oth_lang',        
        'diff_able',        
        'able1',        
        'able2',        
        'able3',        
        'profpic',        
        'picpath',        
        'picname',        
    ];
    protected $table = 'resupdet';
}
