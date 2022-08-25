<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('verify_through')->nullable();
            $table->string('doc_id')->nullable();
            $table->text('doc_photo_url')->nullable();
            $table->date('expiry_at')->nullable();
            $table->string('requestForRole')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('verify_through');
            $table->dropColumn('doc_id');
            $table->dropColumn('doc_photo');
            $table->dropColumn('expiry_at');
            $table->dropColumn('requestForRole');
        });
    }
}
