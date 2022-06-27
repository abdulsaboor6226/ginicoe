<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerMedicare extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_id_fk','medicare_country_id_fk','medicare_state','medicare_id'];

    public  function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id_fk');
    }
    public function country(){
        return $this->belongsTo(AllCountry::class,'medicare_country_id_fk');
    }
}
