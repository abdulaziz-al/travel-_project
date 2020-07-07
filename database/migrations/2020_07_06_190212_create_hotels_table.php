<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_job_id')->unsigned()->index()->nullable();
            $table->foreign('user_job_id')->references('id')->on('user_jobs')->onDelete('cascade');
            
            $table->string('name');
            $table->string('city');
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->integer('night')->nullable();
            $table->integer('room')->nullable();




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
        Schema::dropIfExists('hotels');
    }
}
