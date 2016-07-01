<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVehicleEngineData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->integer('engine_cyl');
            $table->integer('engine_hp');
            $table->string('engine_type', 50);
            $table->string('engine_fuel', 50);
            $table->decimal('engine_size');
            $table->string('engine_config', 50);
            $table->integer('edmunds_id');
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
            //
        });
    }
}
