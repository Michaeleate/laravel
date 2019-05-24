<?php

namespace App\recruiter;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class modrecruiter extends Authenticatable
{
    use Notifiable;

    protected $guard = 'recruiter';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type', 'name', 'email', 'mob_num', 'password', 'is_recruiter',
    ];

    protected $table = 'recruiters';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}