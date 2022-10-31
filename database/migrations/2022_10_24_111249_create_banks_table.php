<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('financial_institution_title');
            $table->string('f_name');
            $table->string('m_name')->nullable();
            $table->string('l_name');
            $table->string('phone_no')->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('job_title');
            $table->string('secondary_f_name')->nullable();
            $table->string('secondary_l_name')->nullable();
            $table->string('secondary_phone_no')->unique()->nullable();
            $table->string('secondary_fax_no')->unique()->nullable();
            $table->string('secondary_email')->unique()->nullable();
            $table->json('financial_institution_represent');
            $table->unsignedBigInteger('FI_type');
            $table->tinyInteger('FI_operate_across_state')->default(0);
            $table->unsignedBigInteger('asset_size');
            $table->json('FI_performs');
            $table->string('BIN');
            $table->unsignedBigInteger('daily_trade');
            $table->string('portfolio_size');
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
        Schema::dropIfExists('banks');
    }
}
