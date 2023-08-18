<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongsTo(Products::class,'product_id','id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
