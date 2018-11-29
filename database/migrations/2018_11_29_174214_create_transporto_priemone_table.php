<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportoPriemoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporto_priemone', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('valstybinisNr');
            $table->string('VIN');
            $table->string('marke');
            $table->string('modelis');
            $table->string('spalva');
            $table->integer('kategorija');
            $table->integer('galingumas');
            $table->unsignedInteger('FK_Klientas')->index();
            $table->foreign('FK_Klientas')->references('id')->on('klientas');
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
        Schema::dropIfExists('transporto_priemone');
    }
}
