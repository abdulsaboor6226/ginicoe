<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Consumer extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['user_id_fk','salutation_id_fk','first_name','middle_name','last_name','birthday','primary_email','primary_phone','current_us_address_1','current_us_address_2','current_us_urbanization_name','current_us_state_id_fk','current_us_city_id_fk','current_us_zip','current_us_area_code','current_us_lived_for_more_than_two_years','birth_country_id_fk','birth_state_id_fk','birth_city_id_fk','birth_hospital','social_security','credit_privacy','mask','previous_us_address_1','previous_us_address_2','previous_us_urbanization_name','previous_us_state_id_fk','previous_us_city_id_fk','previous_us_zip','previous_us_area_code','secondary_email','secondary_phone','emergency_phone','emergency_salutation_id_fk','emergency_first_name','emergency_last_name','emergency_middle_name','emergency_us_address_1','emergency_us_address_2','emergency_us_urbanization_name','emergency_us_state_id_fk','emergency_us_city_id_fk','emergency_us_zip','emergency_us_area_code','emergency_email','is_us_citizen','ginicoe_id','allow_law_enforcement_to_know_your_disability','disability_description','medication','net_worth','occupation','state_id','us_military_branch','us_military','us_employee_badge','us_govt_badge_country_id_fk','us_govt_badge_state_id_fk','us_govt_badge_id','us_agency_description','foreign_agency_description','bureau_of_indian_affairs_card_number','tribal_treaty_card_number','tribal_id','mid_wife_first_name','mid_wife_last_name','birth_house_number','birth_street_name','birth_urbanization_name','birth_zip','birth_area_code','first_responder_street_name','first_responder_highway_name','closest_intersection','closest_parking_lot_name','closest_train_station','closest_bus_stop','date_of_birth','race','complexion','gender_identity','sexual_orientation','sex_assigned_at_birth','marital_status','height','weight','have_living_siblings','hair_color','hair_style','facial_hair','eye_color','prescribed_glasses','hand_usage_preference'];

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'current_us_lived_for_more_than_two_years' => 'boolean',
        'is_us_citizen' => 'boolean',
    ];

    protected static function boot()
    {

        parent::boot();

        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = auth()->user()->id;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });

        // deleting deleting_by when model is updated
        static::deleted(function ($model) {
            if (!$model->isDirty('deleted_by')) {
                $model->deleted_by = auth()->user()->id;
                $model->save();
            }
        });

        // creating ginicoe_id when model is creating
        static::creating(function ($model) {
            $model->ginicoe_id = Str::uuid()->toString();
        });

        if (Auth::check()){
            if (Auth::user()->permissions_id ===4) {
                static::addGlobalScope('consumers', function (Builder $builder) {
                    $builder->where('created_by',Auth::user()->id)->whereRelation('user','permissions_id',4);
                });
            }
        }
    }

    public function birth_country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AllCountry::class,'birth_country_id_fk');
    }
    public function birth_state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AllState::class,'birth_state_id_fk');
    }
    public function birth_city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AllCity::class,'birth_city_id_fk');
    }
    public function us_govt_badge_country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AllCountry::class,'us_govt_badge_country_id_fk');
    }
    public function us_govt_badge_state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AllState::class,'us_govt_badge_state_id_fk');
    }
    public function current_us_state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AllState::class,'current_us_state_id_fk');
    }
    public function current_us_city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AllCity::class,'current_us_city_id_fk');
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
        return $this->hasMany(ConsumerHuntingLicence::class,'consumer_id_fk');
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
    public function image(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConsumerImage::class,'consumer_id_fk');
    }
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function salutations(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Dictionary::class,'salutation_id_fk');
    }
}
