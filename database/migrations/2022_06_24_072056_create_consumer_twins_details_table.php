<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumerTwinsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_twins_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_id_fk');
            $table->string('living_twin_salutation');
            $table->string('living_twin_first_name');
            $table->string('living_twin_middle_name');
            $table->string('living_twin_last_name');
            $table->string('twin_classification');
            $table->string('difference_with_the_twin');
            $table->string('twin_gender');
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
        Schema::dropIfExists('consumer_twins_details');
    }
}
