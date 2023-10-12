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
            $table->id();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('hobbies');
            $table->enum('gender', ['0','1','2'])->comment('0-Male,1-Female,2-Other')->nullable();
            $table->string('address')->nullable();
            $table->string('password')->nullable();
            $table->string('city')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['0','1','2'])->comment('0-active,1-in-active,2-delete');
            $table->rememberToken();
            $table->softDeletes();
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
