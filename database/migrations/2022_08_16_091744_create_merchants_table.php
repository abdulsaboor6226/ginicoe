<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id_fk');
            $table->string('business_legal_name');
            $table->string('business_DBA_name');
            $table->string('business_structure');
            $table->string('business_legal_address');
            $table->string('business_city');
            $table->string('business_state');
            $table->string('business_zip');
            $table->unsignedBigInteger('business_country_id_fk');
            $table->string('federal_tax_id');
            $table->string('DUNS_number');
            $table->string('ownership');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('phone_no');
            $table->string('telephone_number')->nullable();
            $table->string('DOB');
            $table->string('home_address');
            $table->string('city');
            $table->string('state');
            $table->string('country_id_fk');
            $table->string('ownership_percentage');
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
        Schema::dropIfExists('merchants');
    }
}
