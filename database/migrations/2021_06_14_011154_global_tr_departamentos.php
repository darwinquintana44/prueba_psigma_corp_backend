<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GlobalTrDepartamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_tr_departamentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('global_tr_paises_id');
            $table->string('descripcion', 120);
            $table->string('sigla', 5)->nullable();
            $table->integer('codigo')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('global_tr_paises_id')->references('id')->on('global_tr_paises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_tr_departamentos');
    }
}
