<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpibiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epibios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('baseinfo_id')->unsigned();
            $table->foreign('baseinfo_id')->references('id')->on('baseinfos')->onDelete('cascade');
            $table->boolean('smoke');
            $table->smallInteger('smo_age');
            $table->boolean('quit_smoking');
            $table->integer('smo_num');
            $table->tinyInteger('smo_type');
            $table->integer('smo_quit_time');
            $table->boolean('passive_smo');
            $table->text('smo_comments');
            $table->boolean('drink');
            $table->tinyInteger('dri_age');
            $table->boolean('quit_dri');
            $table->integer('capacity');
            $table->tinyInteger('dri_type');
            $table->smallInteger('dri_quit_time');
            $table->text('dri_comments');
            $table->boolean('tabacoo');
            $table->string('tabacoo_dos');
            $table->boolean('betel');
            $table->string('betel_dos');
            $table->tinyInteger('food');
            $table->boolean('sys_d');
            $table->text('sys_d_details');
            $table->boolean('fami_d');
            $table->text('fami_d_details');
            $table->boolean('drug');
            $table->text('drug_details');
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
        Schema::drop('epibios');
    }
}
