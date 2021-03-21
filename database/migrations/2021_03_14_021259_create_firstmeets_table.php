<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstmeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firstmeets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('isPlotFirstmeet');
            $table->string('textPlot');
            $table->string('afterChoosePlot');
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
        Schema::dropIfExists('firstmeets');
    }
}
