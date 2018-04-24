<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'user_id', 'user_name', 'password','user_role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $primaryKey = "user_id";
    protected $table = 'users';
    public $timestamps= false;

}
