<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnineApziuraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technine_apziura', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->date('atlikimoData');
            $table->date('galiojimoData');
            $table->float('kaina');
            $table->boolean('arPraeita');
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
        Schema::dropIfExists('technine_apziura');
    }
}
