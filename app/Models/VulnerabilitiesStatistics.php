<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VulnerabilitiesStatistics extends Model
{
    use HasFactory;
    protected $fillable = ['type_of_breach','total_records','year_of_breach'];
}
