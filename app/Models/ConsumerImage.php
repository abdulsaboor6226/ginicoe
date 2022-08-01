<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class ConsumerImage extends Model
{
    use HasFactory;

    protected $fillable = ['consumer_id_fk','file_type','image_content_type','extension','url'];
}
