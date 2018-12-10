<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klientas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vardas');
            $table->string('pavarde');
            $table->string('asmens_kodas');
            $table->string('tel_nr');
            $table->string('miestas');
            $table->string('adresas');
            $table->date('gimimo_data');
            $table->string('e_pastas');
            $table->unsignedInteger('FK_Darbuotojas')->index()->nullable();
            $table->foreign('FK_Darbuotojas')->references('id')->on('darbuotojas');
            $table->unsignedInteger('FK_Pirisijungimo_id')->index();
            $table->foreign('FK_Pirisijungimo_id')->references('id')->on('users');
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
        Schema::dropIfExists('klientas');
    }
}
