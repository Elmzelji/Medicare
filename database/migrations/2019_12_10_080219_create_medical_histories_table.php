<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Reference');
            $table->bigInteger('patient')->unsigned();
            $table->foreign('patient')->references('id')->on('patients');
            $table->integer('weight');
            $table->mediumText('ATCD')->nullable();
            $table->mediumText('EXCV')->nullable();
            $table->mediumText('CAF')->nullable();
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
        Schema::dropIfExists('medical_histories');
    }
}
