<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerPassport extends Model
{
    use HasFactory;

    protected $fillable = ['consumer_id_fk', 'passport_country_id_fk', 'passport_number', 'passport_issuance_date', 'passport_expiration_date'];

    public  function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id_fk');
    }
    public function country(){
        return $this->belongsTo(AllCountry::class,'passport_country_id_fk');
    }
}
