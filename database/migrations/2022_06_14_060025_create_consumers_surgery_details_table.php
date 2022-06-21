<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersSurgeryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers_surgery_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_id');
            $table->string('surgery_location_on_face')->nullable();
            $table->date('surgery_date');
            $table->string('surgeon_salutation')->nullable();
            $table->string('surgeon_first_name')->nullable();
            $table->string('surgeon_middle_name')->nullable();
            $table->string('surgeon_last_name')->nullable();
            $table->string('surgeon_contact_number')->nullable();
            $table->string('medical_practice_name')->nullable();
            $table->string('building_number')->nullable();
            $table->string('street')->nullable();
            $table->string('suite')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('urbanization_name')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('area_code')->nullable();
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
        Schema::dropIfExists('consumers_surgery_details');
    }
}
