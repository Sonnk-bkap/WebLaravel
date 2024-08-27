<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Khachhang extends Authenticatable
{
     use HasFactory, Notifiable;
    protected $table='Khachhang';
     protected $fillable = [
       'username', 'fulname', 'email', 'password','phone','Active'
    ];
    public $timestamps=false;
}
