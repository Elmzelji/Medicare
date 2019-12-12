<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title')->nullable();
            $table->string('title_heading')->nullable();
            $table->string('subtitle_heading')->nullable();
            $table->string('cta_text')->nullable();
            $table->string('cta_link')->nullable();

            $table->string('testemonial_1_text')->nullable();
            $table->string('testemonial_1_img_link')->nullable();
            $table->string('testemonial_1_profession')->nullable();
            $table->string('testemonial_1_provider')->nullable();

            $table->string('testemonial_2_text')->nullable();
            $table->string('testemonial_2_img_link')->nullable();
            $table->string('testemonial_2_profession')->nullable();
            $table->string('testemonial_2_provider')->nullable();

            $table->string('about_heading_left')->nullable();
            $table->text('about_text_left')->nullable();

            $table->string('about_heading_right')->nullable();
            $table->text('about_text_right')->nullable();

            $table->integer('cabinet_price')->nullable();


            $table->timestamps();
        });

        DB::table('settings')->insert(
          array(
              'title' => 'Dr. Ibrahim Amzil',
              'cabinet_price' => 150
          )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
