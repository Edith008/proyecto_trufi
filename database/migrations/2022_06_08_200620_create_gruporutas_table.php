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
        Schema::create('gruporutas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ruta_id')->unsigned();
            $table->string('nombre');
            $table->timestamps();

            $table->foreign('ruta_id')->references('id')->on('rutas')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gruporutas');
    }
};
