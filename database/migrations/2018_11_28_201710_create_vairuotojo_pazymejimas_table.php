<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVairuotojoPazymejimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vairuotojo_pazymejimas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('isdavimo_data');
            $table->date('galiojimo_data');
            $table->integer('pazymejimo_nr');
            $table->unsignedInteger('FK_Klientas')->index();
            $table->foreign('FK_Klientas')->references('id')->on('Klientas');
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
        Schema::dropIfExists('vairuotojo_pazymejimas');
    }
}
