<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_job_id')->unsigned()->index();
            $table->foreign('user_job_id')->references('id')->on('user_jobs')->onDelete('cascade');
            $table->integer('driver_id')->unsigned()->index();
            $table->foreign('driver_id')->references('id')->on('user_jobs')->onDelete('cascade');
            
            $table->string('from');
            $table->string('to');
            
            $table->integer('passenger');
            $table->string('start_time');

            $table->string('driver_move');
            $table->string('expected_time');
            $table->text('text');
            $table->integer('status');
            
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
        Schema::dropIfExists('travel');
    }
}
