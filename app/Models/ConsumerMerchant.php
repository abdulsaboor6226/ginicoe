<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerMerchant extends Model
{
    use HasFactory;

    protected $fillable = ['consumer_id_fk'];
}
