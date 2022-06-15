<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumers_face_details extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_id','type','location','size','shape','color'];
}
