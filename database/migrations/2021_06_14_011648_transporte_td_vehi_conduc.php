<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransporteTdVehiConduc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporte_td_vehi_conduc', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_vehiculo');
            $table->bigInteger('id_conductor');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_vehiculo')->references('id')->on('transporte_tm_vehiculos');
            $table->foreign('id_conductor')->references('id')->on('transporte_tr_conductores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transporte_td_vehi_conduc');
    }
}
