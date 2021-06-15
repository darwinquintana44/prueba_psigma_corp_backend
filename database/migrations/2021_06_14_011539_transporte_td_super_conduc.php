<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransporteTdSuperConduc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporte_td_super_conduc', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_supervisor');
            $table->bigInteger('id_conductor');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_supervisor')->references('id')->on('transporte_tr_supervisores');
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
        Schema::dropIfExists('transporte_td_super_conduc');
    }
}
