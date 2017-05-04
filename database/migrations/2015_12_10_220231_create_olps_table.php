<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOlpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olps', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('clinical_id')->unsigned();
            $table->foreign('clinical_id')->references('id')->on('clinicals')->onDelete('cascade');
            $table->smallInteger('site');
            $table->tinyInteger('bw');
            $table->tinyInteger('cx');
            $table->smallInteger('ml_long');
            $table->smallInteger('ml_wide');
            $table->string('site_img');
            $table->boolean('cancer');
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
        Schema::drop('olps');
    }
}
