<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumerMedicaidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_medicaids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_id_fk');
            $table->unsignedBigInteger('medicaid_country_id_fk');
            $table->string('medicaid_state');
            $table->string('medicaid_id');
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
        Schema::dropIfExists('consumer_medicaids');
    }
}
