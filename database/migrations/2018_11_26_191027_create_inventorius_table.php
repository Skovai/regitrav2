<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventorius', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pavadinimas');
            $table->integer('serijos_numeris');
            $table->unsignedInteger('darbuotojas_id')->index();
            $table->foreign('darbuotojas_id')->references('id')->on('darbuotojas');
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
        Schema::dropIfExists('inventorius');
    }
}
