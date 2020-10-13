<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'name', 'email', 'password',
    ];

  
    public function employee_company()
    {
        return $this->hasMany('App\Company');
    }

    public function employee_skill()
    {
        return $this->hasMany('App\Skill');
    }
}
