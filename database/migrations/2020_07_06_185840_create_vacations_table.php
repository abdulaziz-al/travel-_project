<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_job_id')->unsigned()->index();
            $table->foreign('user_job_id')->references('id')->on('user_jobs')->onDelete('cascade');
            $table->string('Reason');
            $table->string('from');
            $table->string('to');
            $table->boolean('seen');
            
            $table->integer('status');
            $table->integer('accepted_by')->unsigned()->index();
            $table->foreign('accepted_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('seen_by')->unsigned()->index();
            $table->foreign('seen_by')->references('id')->on('users')->onDelete('cascade');

            
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
        Schema::dropIfExists('vacations');
    }
}
