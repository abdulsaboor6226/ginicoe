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
            $table->string('salutation')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('social_security_number')->nullable();
            $table->tinyInteger('credit_privacy')->default(1);
            $table->tinyInteger('mask')->default(1);
            $table->text('current_us_address_1')->nullable();
            $table->text('current_us_address_2')->nullable();
            $table->text('current_us_urbanization_name')->nullable();
            $table->string('current_us_city')->nullable();
            $table->string('current_us_state')->nullable();
            $table->string('current_us_zip')->nullable();
            $table->string('current_us_area_code')->nullable();
            $table->tinyInteger('current_us_lived_for_more_than_two_years')->default(1);
            $table->text('previous_us_address_1')->nullable();
            $table->text('previous_us_address_2')->nullable();
            $table->string('previous_us_urbanization_name')->nullable();
            $table->string('previous_us_city')->nullable();
            $table->string('previous_us_state')->nullable();
            $table->string('previous_us_zip')->nullable();
            $table->string('previous_us_area_code')->nullable();
            $table->string('primary_email')->unique();
            $table->bigInteger('primary_phone')->nullable();
            $table->string('secondary_email')->unique()->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('emergency_salutation')->nullable();
            $table->string('emergency_first_name')->nullable();
            $table->string('emergency_last_name')->nullable();
            $table->string('emergency_middle_name')->nullable();
            $table->text('emergency_us_address_1')->nullable();
            $table->text('emergency_us_address_2')->nullable();
            $table->string('emergency_us_urbanization_name')->nullable();
            $table->string('emergency_us_city')->nullable();
            $table->string('emergency_us_state')->nullable();
            $table->string('emergency_us_zip')->nullable();
            $table->string('emergency_us_area_code')->nullable();
            $table->string('emergency_email')->unique()->nullable();
            $table->tinyInteger('is_us_citizen')->default(1);
            $table->string('country_of_passport')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_issuance_date')->nullable();
            $table->date('passport_expiration_date')->nullable();
            $table->string('driving_license_country')->nullable();
            $table->string('driving_licensing_state')->nullable();
            $table->string('driving_license_number')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->string('birth_country')->nullable();
            $table->string('birth_state')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('birth_hospital')->nullable();
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
        Schema::dropIfExists('consumers');
    }
}
