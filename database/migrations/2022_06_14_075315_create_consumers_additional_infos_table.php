<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersAdditionalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers_additional_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ginicoe_id')->nullable();
            $table->tinyInteger('allow_law_enforcement_to_know_your_disability')->default(1);
            $table->text('disability_description')->nullable();
            $table->text('medication')->nullable();
            $table->string('net_worth')->nullable();
            $table->string('occupation')->nullable();
            $table->string('state_id')->nullable();
            $table->string('hunting_country')->nullable();
            $table->string('hunting_state')->nullable();
            $table->string('hunting_license_id')->nullable();
            $table->string('fishing_country')->nullable();
            $table->string('fishing_state')->nullable();
            $table->string('fishing_license_id')->nullable();
            $table->string('fire_arm_country')->nullable();
            $table->string('fire_arm_state')->nullable();
            $table->string('fire_arm_id')->nullable();
            $table->string('medicaid_country')->nullable();
            $table->string('medicaid_state')->nullable();
            $table->string('medicaid_id')->nullable();
            $table->string('medicare_country')->nullable();
            $table->string('medicare_state')->nullable();
            $table->string('medicare_id')->nullable();
            $table->string('pilot_license_country')->nullable();
            $table->string('pilot_license_state')->nullable();
            $table->string('pilot_license_id')->nullable();
            $table->string('us_military_branch')->nullable();
            $table->string('us_military_id')->nullable();
            $table->string('us_employee_badge_number')->nullable();
            $table->string('us_govt_badge_country')->nullable();
            $table->string('us_govt_badge_state')->nullable();
            $table->string('us_govt_badge_number')->nullable();
            $table->string('non_us_govt_badge_country')->nullable();
            $table->string('non_us_govt_badge_state')->nullable();
            $table->string('non_us_govt_badge_number')->nullable();
            $table->text('us_agency_description')->nullable();
            $table->text('foreign_agency_description')->nullable();
            $table->string('bureau_of_indian_affairs_card_number')->nullable();
            $table->string('tribal_treaty_card_number')->nullable();
            $table->string('tribal_id')->nullable();
            $table->string('mid_wife_first_name')->nullable();
            $table->string('mid_wife_last_name')->nullable();
            $table->string('birth_house_number')->nullable();
            $table->string('birth_street_name')->nullable();
            $table->string('birth_urbanization_name')->nullable();
            $table->string('birth_zip')->nullable();
            $table->string('birth_area_code')->nullable();
            $table->string('first_responder_street_name')->nullable();
            $table->string('first_responder_highway_name')->nullable();
            $table->text('closest_intersection')->nullable();
            $table->text('closest_parking_lot_name')->nullable();
            $table->text('closest_train_station')->nullable();
            $table->text('closest_bus_stop')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('race')->nullable();
            $table->text('complexion')->nullable();
            $table->string('gender_identity')->nullable();
            $table->string('sexual_orientation')->nullable();
            $table->string('sex_assigned_at_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->text('living_twin_salutation')->nullable();
            $table->string('living_twin_first_name')->nullable();
            $table->string('living_twin_middle_name')->nullable();
            $table->string('living_twin_last_name')->nullable();
            $table->text('twin_classification')->nullable();
            $table->text('difference_with_the_twin')->nullable();
            $table->string('twin_gender')->nullable();
            $table->tinyInteger('have_living_siblings')->default(1);
            $table->string('hair_color')->nullable();
            $table->string('hair_style')->nullable();
            $table->string('facial_hair')->nullable();
            $table->string('eye_color')->nullable();
            $table->tinyInteger('prescribed_glasses')->default(1);
            $table->string('hand_usage_preference')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumers_additional_infos');
    }
}
