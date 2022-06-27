<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerDrivingLicence extends Model
{
    use HasFactory;
    protected $fillable= ['consumer_id_fk','driving_license_country_id_fk','driving_licensing_state','driving_license_id'];

    public  function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id_fk');
    }
    public function country(){
        return $this->belongsTo(AllCountry::class,'driving_license_country_id_fk');
    }
}
