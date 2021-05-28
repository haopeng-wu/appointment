<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
			$table->foreignId('founder_id')->nullable();
			$table->foreignId('host_id')->nullable();

			$table->integer('total')->nullable();
			$table->integer('villager')->nullable();
			$table->integer('wolf')->nullable();
			$table->integer('prophet')->nullable();
			$table->integer('guardian')->nullable();
			$table->integer('hunter')->nullable();
			$table->integer('witch')->nullable();
			$table->integer('knight')->nullable();
			$table->integer('wolf-king')->nullable();
			$table->integer('white-wolf-king')->nullable();

            $table->timestamps();

			$table->foreign('founder_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('host_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
