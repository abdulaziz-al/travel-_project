<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_job_id')->unsigned()->index();
            $table->foreign('user_job_id')->references('id')->on('user_jobs')->onDelete('cascade');
            $table->string('type');
            $table->string('company_name');
            $table->string('country');
            $table->string('phone');
            $table->string('email');
            $table->string('path');
            $table->double('price');
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
        Schema::dropIfExists('operations');
    }
}
