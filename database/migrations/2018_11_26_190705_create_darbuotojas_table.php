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
            $table->unsignedInteger('pareigos')->index();
            $table->foreign('pareigos')->references('id')->on('pareigos');
            $table->string('vardas');
            $table->string('pavarde');
            $table->string('miestas');
            $table->string('adresas');
            $table->string('telefonas');
            $table->string('e_pastas');
            $table->biginteger('asmens_kodas');
            $table->date('gimimo_data');
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
        Schema::dropIfExists('darbuotojas');
    }
}
