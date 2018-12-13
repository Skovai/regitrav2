<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZinuteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zinute', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zinute');
            $table->integer('tipas');
            $table->unsignedInteger('FK_Klientas')->index();
            $table->foreign('FK_Klientas')->references('id')->on('klientas');
            $table->unsignedInteger('FK_KlientasSenas')->index();
            $table->foreign('FK_KlientasSenas')->references('id')->on('klientas');
            $table->unsignedInteger('FK_KlientasNaujas')->index();
            $table->foreign('FK_KlientasNaujas')->references('id')->on('klientas');
            $table->unsignedInteger('FK_Darbuotojas')->index();
            $table->foreign('FK_Darbuotojas')->references('id')->on('darbuotojas');
            $table->unsignedInteger('FK_TransportoPriemone')->index();
            $table->foreign('FK_TransportoPriemone')->references('id')->on('transporto_priemone');
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
        Schema::dropIfExists('zinute');
    }
}
