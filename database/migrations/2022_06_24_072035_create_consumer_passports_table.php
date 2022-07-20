<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumerPassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_passports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_id_fk');
            $table->unsignedBigInteger('passport_country_id_fk');
            $table->string('passport_number');
            $table->date('passport_issuance_date');
            $table->date('passport_expiration_date');
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
        Schema::dropIfExists('consumer_passports');
    }
}
