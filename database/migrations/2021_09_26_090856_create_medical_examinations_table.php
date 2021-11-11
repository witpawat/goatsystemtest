<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_examinations', function (Blueprint $table) {
            $table->increments('medicalId');
            $table->string('typeOfDisease');
            $table->date('dateExamination');
            $table->string('result');
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
        Schema::dropIfExists('medical_examinations');
    }
}
