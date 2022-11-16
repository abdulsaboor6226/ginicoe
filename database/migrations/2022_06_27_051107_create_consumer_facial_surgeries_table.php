<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumerFacialSurgeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_facial_surgeries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_id_fk');
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
            $table->string('country_id_fk')->nullable();
            $table->string('state_id_fk')->nullable();
            $table->string('city_id_fk')->nullable();
            $table->string('zip')->nullable();
            $table->string('area_code')->nullable();
            $table->timestamps();
            $table->foreign('consumer_id_fk')->references('id')->on('consumers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumer_facial_surgeries');
    }
}
