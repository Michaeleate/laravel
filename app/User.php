<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*Mike
     protected $fillable = [
        'name', 'email', 'password',
    ];
    */

    protected $fillable = [
        'name', 
        'mob_num', 
        'email', 
        'password', 
        'user_type', 
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*Mike
     protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    */

    protected $casts = [
        'email_verified_at' => 'datetime',
        'mob_verified_at' => 'datetime',
    ];

    public function files()
    {
      return $this->hasMany(File::class);
    }
}
