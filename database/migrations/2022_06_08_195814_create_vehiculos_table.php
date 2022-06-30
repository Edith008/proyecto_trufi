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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('socio_id')->unsigned();
            $table->string('marca');
            $table->string('matricula');
            $table->string('modelo');
            $table->string('ruat');
            $table->string('estado');
            $table->string('soat');
            $table->timestamps();

            $table->foreign('socio_id')->references('id')->on('socios')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
};
