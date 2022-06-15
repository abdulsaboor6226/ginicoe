<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    use HasFactory;
    protected $fillable = ['salutation','first_name','middle_name','last_name','birthday','social_security_number','credit_privacy','mask','current_us_address_1','current_us_address_2','current_us_urbanization_name','current_us_city','current_us_state','current_us_zip','current_us_area_code','current_us_lived_for_more_than_two_years','previous_us_address_1','previous_us_address_2','previous_us_urbanization_name','previous_us_city','previous_us_state','previous_us_zip','previous_us_area_code','primary_email','primary_phone','secondary_email','secondary_phone','emergency_salutation','emergency_first_name','emergency_last_name','emergency_middle_name','emergency_us_address_1','emergency_us_address_2','emergency_us_urbanization_name','emergency_us_city','emergency_us_state','emergency_us_zip','emergency_us_area_code','emergency_email','is_us_citizen','country_of_passport','passport_number','passport_issuance_date','passport_expiration_date','driving_license_country','driving_licensing_state','driving_license_number','emergency_phone','birth_country','birth_state','birth_city','birth_hospital'];
}
