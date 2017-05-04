<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baseinfos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->smallInteger('times');
            $table->string('recorder')->nullable();
            $table->string('bingli')->nullable();
            $table->string('mphone')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('qq')->nullable();
            $table->string('weixin')->nullable();
            $table->tinyInteger('job_status')->nullable();
            $table->text('job')->nullable();
            $table->tinyInteger('education')->nullable();
            $table->tinyInteger('living')->nullable();
            $table->tinyInteger('living_status')->nullable();
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
        Schema::drop('baseinfos');
    }
}
