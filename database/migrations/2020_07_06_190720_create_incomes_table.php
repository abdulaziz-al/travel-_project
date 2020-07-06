<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('program_id')->unsigned()->index()->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->integer('opration_id')->unsigned()->index()->nullable();
            $table->foreign('opration_id')->references('id')->on('operations')->onDelete('cascade');
         
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
        Schema::dropIfExists('incomes');
    }
}
