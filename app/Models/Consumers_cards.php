<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumers_cards extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_id','card_type','card_number','primary_card_holder_first_name','primary_card_holder_last_name','bank','secondary_card_holder_relationship','secondary_card_holder_first_name','secondary_card_holder_last_name'];

    protected $attributes = [
        'consumer_id' => 1,
    ];
}
