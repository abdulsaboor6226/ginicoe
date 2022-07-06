<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Consumer extends Model
{
    use HasFactory;
    protected $fillable = ['ginicoe_id','salutation','first_name','middle_name','last_name','birthday','primary_email','primary_phone','current_us_address_1','current_us_address_2','current_us_urbanization_name','current_us_city','current_us_state','current_us_zip','current_us_area_code','current_us_lived_for_more_than_two_years','social_security','credit_privacy','mask','birth_country_id_fk','birth_state','birth_city','birth_hospital','mid_wife_first_name','mid_wife_last_name','birth_house_number','birth_street_name','birth_urbanization_name','birth_zip','birth_area_code','first_responder_street_name','first_responder_highway_name','closest_intersection','closest_parking_lot_name','closest_train_station','closest_bus_stop','date_of_birth','emergency_phone','emergency_salutation','emergency_first_name','emergency_last_name','emergency_middle_name','emergency_us_address_1','emergency_us_address_2','emergency_us_urbanization_name','emergency_us_city','emergency_us_state','emergency_us_zip','emergency_us_area_code','emergency_email','previous_us_address_1','previous_us_address_2','previous_us_urbanization_name','previous_us_city','previous_us_state','previous_us_zip','previous_us_area_code','secondary_email','secondary_phone','is_us_citizen','complexion','gender_identity','sexual_orientation','sex_assigned_at_birth','marital_status','height','weight','hair_color','hair_style','facial_hair','eye_color','prescribed_glasses','hand_usage_preference','race','allow_law_enforcement_to_know_your_disability','disability_description','medication','net_worth','occupation','state_id','us_military_branch','us_military','us_employee_badge','us_govt_badge_country_id_fk','us_govt_badge_state','us_govt_badge_id','us_agency_description','foreign_agency_description','bureau_of_indian_affairs_card_number','tribal_treaty_card_number','tribal_id','have_living_siblings'];

    protected $casts = [
        'current_us_lived_for_more_than_two_years' => 'boolean',
        'is_us_citizen' => 'boolean',
    ];

    public function country(){
        return $this->belongsTo(AllCountry::class,'birth_country_id_fk');
    }
    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->ginicoe_id = Str::uuid()->toString();
        });
    }
    public function driving_licence(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerDrivingLicence::class,'consumer_id_fk');
    }
    public function aviation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerAviationLicence::class,'consumer_id_fk');
    }
    public function fire_arms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerFireArm::class,'consumer_id_fk');
    }
    public function fishing(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerFishingLicence::class,'consumer_id_fk');
    }
    public function hunting(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerDrivingLicence::class,'consumer_id_fk');
    }
    public function medicaids(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerMedicaid::class,'consumer_id_fk');
    }
    public function medicares(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerMedicare::class,'consumer_id_fk');
    }
    public function non_US_employment(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerNonUSEmployment::class,'consumer_id_fk');
    }
    public function passport(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerPassport::class,'consumer_id_fk');
    }
    public function twins(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerTwinsDetail::class,'consumer_id_fk');
    }

}
