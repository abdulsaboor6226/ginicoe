<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id_fk');
            $table->string('salutation')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('primary_email')->unique();
            $table->string('primary_phone')->unique();
            $table->string('current_us_address_1')->nullable();
            $table->text('current_us_address_2')->nullable();
            $table->string('current_us_urbanization_name')->nullable();
            $table->string('current_us_city')->nullable();
            $table->string('current_us_state')->nullable();
            $table->string('current_us_zip')->nullable();
            $table->string('current_us_area_code')->nullable();
            $table->tinyInteger('current_us_lived_for_more_than_two_years')->default(0);
            $table->unsignedBigInteger('birth_country_id_fk')->nullable();
            $table->string('birth_state')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('birth_hospital')->nullable();
            $table->string('social_security')->nullable();
            $table->string('credit_privacy')->nullable();
            $table->string('mask')->nullable();
            $table->string('previous_us_address_1')->nullable();
            $table->text('previous_us_address_2')->nullable();
            $table->string('previous_us_urbanization_name')->nullable();
            $table->string('previous_us_city')->nullable();
            $table->string('previous_us_state')->nullable();
            $table->string('previous_us_zip')->nullable();
            $table->string('previous_us_area_code')->nullable();
            $table->string('secondary_email')->unique()->nullable();
            $table->string('secondary_phone')->unique()->nullable();
            $table->string('emergency_phone')->unique()->nullable();
            $table->string('emergency_salutation')->nullable();
            $table->string('emergency_first_name')->nullable();
            $table->string('emergency_last_name')->nullable();
            $table->string('emergency_middle_name')->nullable();
            $table->string('emergency_us_address_1')->nullable();
            $table->text('emergency_us_address_2')->nullable();
            $table->string('emergency_us_urbanization_name')->nullable();
            $table->string('emergency_us_city')->nullable();
            $table->string('emergency_us_state')->nullable();
            $table->string('emergency_us_zip')->nullable();
            $table->string('emergency_us_area_code')->nullable();
            $table->string('emergency_email')->unique()->nullable();
            $table->tinyInteger('is_us_citizen')->default(0);
            $table->string('ginicoe_id')->nullable();
            $table->string('allow_law_enforcement_to_know_your_disability')->nullable();
            $table->string('disability_description')->nullable();
            $table->string('medication')->nullable();
            $table->string('net_worth')->nullable();
            $table->string('occupation')->nullable();
            $table->string('state_id')->nullable();
            $table->string('us_military_branch')->nullable();
            $table->string('us_military')->nullable();
            $table->string('us_employee_badge')->nullable();
            $table->unsignedBigInteger('us_govt_badge_country_id_fk')->nullable();
            $table->string('us_govt_badge_state')->nullable();
            $table->string('us_govt_badge_id')->nullable();
            $table->string('us_agency_description')->nullable();
            $table->string('foreign_agency_description')->nullable();
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
            $table->string('closest_intersection')->nullable();
            $table->string('closest_parking_lot_name')->nullable();
            $table->string('closest_train_station')->nullable();
            $table->string('closest_bus_stop')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('race')->nullable();
            $table->string('complexion')->nullable();
            $table->string('gender_identity')->nullable();
            $table->string('sexual_orientation')->nullable();
            $table->string('sex_assigned_at_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('have_living_siblings')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('hair_style')->nullable();
            $table->string('facial_hair')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('prescribed_glasses')->nullable();
            $table->string('hand_usage_preference')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id_fk')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumers');
    }
}
