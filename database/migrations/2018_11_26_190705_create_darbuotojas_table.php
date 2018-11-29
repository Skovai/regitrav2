<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDarbuotojasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    function boot()
    {
        Schema::defaultStringLength(191);
    }
    public function up()
    {
        Schema::create('darbuotojas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pareigos');
            $table->string('vardas');
            $table->string('pavarde');
            $table->string('miestas');
            $table->string('adresas');
            $table->string('telefonas');
            $table->string('e_pastas');
            $table->integer('asmens_kodas');
            $table->integer('gimimo_data');
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
        Schema::dropIfExists('darbuotojas');
    }
}
