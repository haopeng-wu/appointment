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
            $table->string('given_name');
            $table->string('family_name');
            $table->string('email')->unique();

            $table->string("gender")->nullable();
            $table->string("sex_orientation")->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string("phone")->nullable();
            $table->string('password')->nullable();
            $table->string("role")->nullable();
            $table->string('date_of_birth')->nullable();

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
