<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class ConsumerImage extends Model
{
    use HasFactory;

    protected $fillable = ['consumer_id_fk','front_image_url','right_side_image_url','left_side_image_url','with_glasses_image_url','with_mask_image_url','with_face_tattoo_image_url','with_piercing_image_url',];
}
