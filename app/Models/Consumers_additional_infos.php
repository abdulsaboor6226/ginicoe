<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumers_additional_infos extends Model
{
    use HasFactory;
    protected $fillable = ['ginicoe_id','allow_law_enforcement_to_know_your_disability','disability_description','medication','net_worth','occupation','state_id','hunting_country','hunting_state','hunting_license_id','fishing_country','fishing_state','fishing_license_id','fire_arm_country','fire_arm_state','fire_arm_id','medicaid_country','medicaid_state','medicaid_id','medicare_country','medicare_state','medicare_id','pilot_license_country','pilot_license_state','pilot_license_id','us_military_branch','us_military_id','us_employee_badge_number','us_govt_badge_country','us_govt_badge_state','us_govt_badge_number','non_us_govt_badge_country','non_us_govt_badge_state','non_us_govt_badge_number','us_agency_description','foreign_agency_description','bureau_of_indian_affairs_card_number','tribal_treaty_card_number','tribal_id','mid_wife_first_name','mid_wife_last_name','birth_house_number','birth_street_name','birth_urbanization_name','birth_zip','birth_area_code','first_responder_street_name','first_responder_highway_name','closest_intersection','closest_parking_lot_name','closest_train_station','closest_bus_stop','date_of_birth','race','complexion','gender_identity','sexual_orientation','sex_assigned_at_birth','marital_status','height','weight','living_twin_salutation','living_twin_first_name','living_twin_middle_name','living_twin_last_name','twin_classification','difference_with_the_twin','twin_gender','have_living_siblings','hair_color','hair_style','facial_hair','eye_color','prescribed_glasses','hand_usage_preference'];
}
