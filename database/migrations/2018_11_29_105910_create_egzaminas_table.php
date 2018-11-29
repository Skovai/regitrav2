<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgzaminasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egzaminas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->time('pradzia');
            $table->time('pabaiga');
            $table->float('kaina');
            $table->string('vieta');
            $table->string('tipas');
            $table->bool('arIslaikyta');
            $table->unsignedInteger('FK_Marsrutas')->index();
            $table->unsignedInteger('FK_Klientas')->index();
            $table->foreign('FK_Marsrutas')->references('id')->on('Marsrutas');
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
        Schema::dropIfExists('egzaminas');
    }
}
