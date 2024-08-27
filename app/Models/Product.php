<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='Product';
    public function cate()
    {
        return $this->hasOne(Category::class,'Id','CategoryId');
    }
    public function scopeTimkiem($query)
    {
        if(request()->key){
            $key=request()->key;
            $query=$query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
