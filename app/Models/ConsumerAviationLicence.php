<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerAviationLicence extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_id_fk','pilot_license_country_id_fk','pilot_license_state','pilot_license_id'];

    public  function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id_fk');
    }
    public function country(){
        return $this->belongsTo(AllCountry::class,'pilot_license_country_id_fk');
    }
}
