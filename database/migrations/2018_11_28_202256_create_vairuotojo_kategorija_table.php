<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVairuotojoKategorijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vairuotojo_kategorija', function (Blueprint $table) {
            $table->increments('id');
            $table->date('isdavimo_data');
            $table->string('kategorija');
            $table->unsignedInteger('FK_Vairuotojo_pazymejimas')->index();
            $table->foreign('FK_Vairuotojo_pazymejimas')->references('id')->on('vairuotojo_pazymejimas');
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
        Schema::dropIfExists('vairuotojo_kategorija');
    }
}
