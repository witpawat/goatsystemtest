<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goats', function (Blueprint $table) {
            $table->string('goatId')->primary();
            $table->string('goatName');
            $table->string('sex');
            $table->string('gene');
            $table->string('image');
            $table->string('colour');
            $table->date('dateOfBirth');
            $table->string('weightOfBirth');
            $table->date('arrivalDate');
            $table->string('fatherId');
            $table->string('fatherGoatName');
            $table->string('fatherGene');
            $table->string('motherId');
            $table->string('motherGoatName');
            $table->string('motherGene');
            $table->BigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goats');
    }
}
