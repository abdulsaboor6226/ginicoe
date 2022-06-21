<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_id');
            $table->string('card_type');
            $table->string('card_number');
            $table->string('primary_card_holder_first_name');
            $table->string('primary_card_holder_last_name');
            $table->string('bank');
            $table->string('secondary_card_holder_relationship');
            $table->string('secondary_card_holder_first_name');
            $table->string('secondary_card_holder_last_name');
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
        Schema::dropIfExists('consumers_cards');
    }
}
