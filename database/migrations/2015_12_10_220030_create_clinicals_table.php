<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('baseinfo_id')->unsigned();
            $table->foreign('baseinfo_id')->references('id')->on('baseinfos')->onDelete('cascade');
            $table->tinyInteger('diagnosis');
            $table->smallInteger('d_course');
            $table->tinyInteger('symptom');
            $table->float('ml_area');
            $table->tinyInteger('olp_type');
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
        Schema::drop('clinicals');
    }
}
