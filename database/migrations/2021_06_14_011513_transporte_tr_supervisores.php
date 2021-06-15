<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransporteTrSupervisores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporte_tr_supervisores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('global_tr_municipios_id');
            $table->string('nombres', 120);
            $table->string('apellidos', 120);
            $table->string('identificacion', 120)->unique();
            $table->string('direccion', 120)->nullable();
            $table->string('telefono', 120)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('global_tr_municipios_id')->references('id')->on('global_tr_municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transporte_tr_supervisores');
    }
}
