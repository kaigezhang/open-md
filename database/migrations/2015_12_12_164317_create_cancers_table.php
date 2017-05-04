<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('result_id')->unsigned();
            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
            $table->string('part');
            $table->tinyInteger('velscope');
            $table->string('velscope_img');
            $table->tinyInteger('toluidine');
            $table->string('toluidine_img');
            $table->tinyInteger('biospy');
            $table->string('biospy_img');
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
        Schema::drop('cancers');
    }
}
