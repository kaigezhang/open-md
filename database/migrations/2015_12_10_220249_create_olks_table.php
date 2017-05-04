<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOlksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('clinical_id')->unsigned();
            $table->foreign('clinical_id')->references('id')->on('clinicals')->onDelete('cascade');
            $table->text('site');
            $table->smallInteger('site_long');
            $table->smallInteger('site_wide');
            $table->tinyInteger('type');
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
        Schema::drop('olks');
    }
}
