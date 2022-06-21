<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','type','category','discount'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
