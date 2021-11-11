<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_updates', function (Blueprint $table) {
            $table->increments('weightId');
            $table->string('timePeriod');
            $table->string('weight');
            $table->string('goat_id');
            $table->foreign('goat_id')->references('goatId')->on('goats')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weight_updates');
    }
}
