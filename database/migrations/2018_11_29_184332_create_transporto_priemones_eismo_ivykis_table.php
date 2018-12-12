<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportoPriemonesEismoIvykisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporto_priemones_eismo_ivykis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('FK_EismoIvykis')->index();
            $table->foreign('FK_EismoIvykis')->references('id')->on('eismo_ivykis');
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
        Schema::dropIfExists('transporto_priemones_eismo_ivykis');
    }
}
