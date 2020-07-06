<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            
            $table->string('name');
            $table->string('email')->unique();      
            $table->string('code_email');
            $table->string('time_email');
            $table->string('verify_email');
            $table->string('phone');
            $table->string('code_phone');
            $table->string('time_phone');
            $table->string('verify_phone');
            $table->string('NID');
            $table->string('exp');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
