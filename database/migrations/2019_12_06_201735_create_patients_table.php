<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('firstName');
          $table->string('lastName');
          $table->date('birthDate');
          $table->enum('gender', ['homme', 'femelle']);
          $table->string('profession')->nullable();
          $table->string('addresse')->nullable();
          $table->string('phoneNumber')->nullable();
          $table->string('sentBy')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
