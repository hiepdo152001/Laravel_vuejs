<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('birthday')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->integer('status')->nullable();
            $table->rememberToken()->nullable();
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
};
