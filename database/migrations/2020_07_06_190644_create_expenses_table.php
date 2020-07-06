<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_job_id')->unsigned()->index()->nullable();
            $table->foreign('user_job_id')->references('id')->on('user_jobs')->onDelete('cascade');
            $table->integer('opration_id')->unsigned()->index()->nullable();
            $table->foreign('opration_id')->references('id')->on('operations')->onDelete('cascade');
            $table->integer('servicing_id')->unsigned()->index()->nullable();
            $table->foreign('servicing_id')->references('id')->on('servicings')->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('expenses');
    }
}
