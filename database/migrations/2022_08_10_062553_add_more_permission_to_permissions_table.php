<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMorePermissionToPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->tinyInteger('consumer')->default(false);
            $table->tinyInteger('merchant')->default(false);
            $table->tinyInteger('bank')->default(false);
            $table->tinyInteger('govt')->default(false);
            $table->unsignedBigInteger('dashboard')->default(11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('consumer');
            $table->dropColumn('merchant');
            $table->dropColumn('bank');
            $table->dropColumn('govt');
            $table->dropColumn('dashboard');
        });
    }
}
