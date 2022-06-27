<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerMedicaid extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_id_fk','medicaid_country_id_fk','medicaid_state','medicaid_id'];

    public  function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id_fk');
    }
    public function country(){
        return $this->belongsTo(AllCountry::class,'medicaid_country_id_fk');
    }
}
