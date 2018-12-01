<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaskaitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saskaita', function (Blueprint $table) {
            $table->increments('id');
            $table->float('suma');
            $table->string('paskirtis');
            $table->date('isdavimo_data');
            $table->time('isdavimo_laikas');
            $table->date('terminas');
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
        Schema::dropIfExists('saskaita');
    }
}
