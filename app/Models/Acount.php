<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Acount extends Authenticatable
{
    use HasFactory;
    protected $table="acounts";
    protected $fillable = [
       'username', 'fulname', 'email', 'password','phone','active'
    ];
protected $hidden = [
        'password',
];
       public $timestamps=false;
}
