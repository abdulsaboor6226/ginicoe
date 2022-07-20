<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumerDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_id_fk');
            $table->string('type')->nullable();
            $table->string('category');
            $table->float('discount');
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
        Schema::dropIfExists('consumer_discounts');
    }
}
