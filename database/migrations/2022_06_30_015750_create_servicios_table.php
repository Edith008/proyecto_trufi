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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('trufi_id')->unsigned();
            $table->time('hsalida');
            $table->time('hllegada')->nullable();
            $table->date('fecha');
            $table->string('observacion')->nullable();
            $table->timestamps();

            $table->foreign('trufi_id')->references('id')->on('trufis')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
};
