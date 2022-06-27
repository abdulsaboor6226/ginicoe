<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerFacialSurgery extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_id_fk','surgery_location_on_face','surgery_date','surgeon_salutation','surgeon_first_name','surgeon_middle_name','surgeon_last_name','surgeon_contact_number','medical_practice_name','building_number','street','suite','address_1','address_2','urbanization_name','','state','city','zip','area_code'];

    public  function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id_fk');
    }
    public function country(){
        return $this->belongsTo(AllCountry::class,'country_id_fk');
    }
}
