<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerTwinsDetail extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_id_fk','living_twin_salutation','living_twin_first_name','living_twin_middle_name','living_twin_last_name','twin_classification','difference_with_the_twin','twin_gender'];

    public  function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id_fk');
    }
}
