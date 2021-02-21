<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('isLolos');
            $table->timestamps();
            $table->unsignedBigInteger('datacaas_id');
            $table->foreign('datacaas_id')->references('id')->on('datacaas')->onDelete('cascade');
            $table->unsignedBigInteger('tahaps_id');
            $table->foreign('tahaps_id')->references('id')->on('tahaps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
