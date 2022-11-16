<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('govts', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('phone_no');
            $table->string('s_phone_no');
            $table->unsignedBigInteger('title');
            $table->string('building_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('urbanization_number')->nullable();
            $table->unsignedBigInteger('country_id_fk');
            $table->unsignedBigInteger('state_id_fk');
            $table->unsignedBigInteger('city_id_fk');
            $table->unsignedBigInteger('type');
            $table->string('zip_code')->nullable();
            $table->unsignedBigInteger('agency_sector_id_fk');
            $table->string('agency_represent');
            $table->tinyInteger('budgeting_authority')->default(false);
            $table->unsignedBigInteger('amount_of_budgeting');
            $table->longText('how_ginicoe_help_you');
            $table->unsignedBigInteger('user_id_fk');
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
        Schema::dropIfExists('govts');
    }
}
