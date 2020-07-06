<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_overs', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_job_id')->unsigned()->index();
            $table->foreign('user_job_id')->references('id')->on('user_jobs')->onDelete('cascade');
            $table->integer('over_salary_id')->unsigned()->index();
            $table->foreign('over_salary_id')->references('id')->on('over_salaries')->onDelete('cascade');
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
        Schema::dropIfExists('user_overs');
    }
}
