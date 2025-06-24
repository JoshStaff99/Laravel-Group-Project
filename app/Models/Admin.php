<?php

namespace App\Models;

// provides auth features
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// extending Authenticatable allows us to use log in, maintain sessions, password reset and remember me functions
class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    protected $hidden = [
        'password',
    ];
}
