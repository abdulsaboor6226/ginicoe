<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerNonUSEmployment extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_id_fk','non_us_govt_badge_country_id_fk','non_us_govt_badge_state','non_us_govt_badge_id'];

    public  function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id_fk');
    }
    public function country(){
        return $this->belongsTo(AllCountry::class,'non_us_govt_badge_country_id_fk');
    }
}
