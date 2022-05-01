<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    public $table       = "users";
    public $primayKey   = "id";
    public $incrementing = true;
    public $timestamps   = false;
    protected $dateFormat = 'U';
}
