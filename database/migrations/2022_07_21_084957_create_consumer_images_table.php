<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumerImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_id_fk');
            $table->longText('front_image_url');
            $table->longText('right_side_image_url');
            $table->longText('left_side_image_url');
            $table->longText('with_glasses_image_url')->nullable();
            $table->longText('with_mask_image_url')->nullable();
            $table->longText('with_face_tattoo_image_url')->nullable();
            $table->longText('with_piercing_image_url')->nullable();
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
        Schema::dropIfExists('consumer_images');
    }
}
