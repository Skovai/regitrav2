<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEismoIvykisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eismo_ivykis', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->time('laikas');
            $table->string('vieta');
            $table->string('aprasas');
            $table->bool('pareigunai');
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
        Schema::dropIfExists('eismo_ivykis');
    }
}
