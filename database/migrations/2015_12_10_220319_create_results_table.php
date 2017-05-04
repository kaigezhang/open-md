<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('baseinfo_id')->unsigned();
            $table->foreign('baseinfo_id')->references('id')->on('baseinfos')->onDelete('cascade');
            $table->string('blood_img');
            $table->string('blood_sugar_img');
            $table->string('liver_img');
            $table->boolean('sharp_teeth');
            $table->boolean('bad_fit');
            $table->tinyInteger('calculus');
            $table->boolean('sys_treat');
            $table->text('sys_drug');
            $table->tinyInteger('sys_time');
            $table->boolean('topical_treat');
            $table->text('topical_drug');
            $table->tinyInteger('topical_time');
            $table->text('comment');
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
        Schema::drop('results');
    }
}
