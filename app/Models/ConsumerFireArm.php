<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerFireArm extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_id_fk','fire_arm_country_id_fk','fire_arm_state','fire_arm_id'];

    public  function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id_fk');
    }
    public function country(){
        return $this->belongsTo(AllCountry::class,'fire_arm_country_id_fk');
    }
}
