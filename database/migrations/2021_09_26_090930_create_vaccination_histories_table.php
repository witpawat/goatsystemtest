<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_histories', function (Blueprint $table) {
            $table->increments('vaccineId');
            $table->string('typeOfVaccine');
            $table->date('dateOfVaccine');
            $table->string('vaccine_staff');
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
        Schema::dropIfExists('vaccination_histories');
    }
}
