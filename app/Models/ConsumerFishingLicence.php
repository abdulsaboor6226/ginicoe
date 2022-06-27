<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerFishingLicence extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_id_fk','fishing_country_id_fk','fishing_state','fishing_license_id'];

    public  function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id_fk');
    }
    public function country(){
        return $this->belongsTo(AllCountry::class,'fishing_country_id_fk');
    }
}
