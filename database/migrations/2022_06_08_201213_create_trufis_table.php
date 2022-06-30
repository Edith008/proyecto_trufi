<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trufis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chofer_id')->unsigned();
            $table->bigInteger('vehiculo_id')->unsigned();
            $table->bigInteger('gruporuta_id')->unsigned();
            $table->timestamps();

            $table->foreign('chofer_id')->references('id')->on('choferes')->onDelete("cascade");
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete("cascade");
            $table->foreign('gruporuta_id')->references('id')->on('gruporutas')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trufis');
    }
};
