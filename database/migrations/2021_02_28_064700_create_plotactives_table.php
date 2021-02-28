<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotactivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plotactives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('isPlotActive');
            $table->timestamps();
            $table->unsignedBigInteger('datacaas_id');
            $table->foreign('datacaas_id')->references('id')->on('datacaas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plotactives');
    }
}
