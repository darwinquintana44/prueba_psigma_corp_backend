<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransporteTrConductores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporte_tr_conductores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ciudad_nacimiento');
            $table->string('nombres', 120);
            $table->string('apellidos', 120);
            $table->string('identificacion', 120)->unique();
            $table->string('direccion', 120)->nullable();
            $table->string('telefono', 120)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ciudad_nacimiento')->references('id')->on('global_tr_municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transporte_tr_conductores');
    }
}
