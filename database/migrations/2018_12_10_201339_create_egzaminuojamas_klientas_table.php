<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgzaminuojamasKlientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egzaminuojamas_klientas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('FK_klientas')->index();
            $table->foreign('FK_klientas')->references('id')->on('klientas');
            $table->unsignedInteger('FK_egzaminas')->index();
            $table->foreign('FK_egzaminas')->references('id')->on('egzaminas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egzaminuojamas_klientas');
    }
}
