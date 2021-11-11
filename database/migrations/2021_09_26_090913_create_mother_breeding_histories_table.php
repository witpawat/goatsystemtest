<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherBreedingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mother_breeding_histories', function (Blueprint $table) {
            $table->increments('breedId');
            $table->string('breedNo');
            $table->date('dateOfBreed');
            $table->string('father_breeder');
            $table->string('breed_staff');
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
        Schema::dropIfExists('mother_breeding_histories');
    }
}
