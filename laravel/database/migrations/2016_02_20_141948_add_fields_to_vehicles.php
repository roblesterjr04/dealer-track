<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->integer('year');
            $table->string('make', 50);
            $table->string('model', 50);
            $table->string('img_url', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('year');
            $table->dropColumn('make');
            $table->dropColumn('model');
            $table->dropColumn('img_url');
        });
    }
}
