<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('play_games', function (Blueprint $table) {
            $table->id();
			$table->foreignId('game_id');
			$table->foreignId('player_id');
			$table->foreignId('card_id')->nullable();
			$table->timestamp('set_role_at')->nullable();
            $table->timestamp('enter_game_at')->nullable();

            $table->timestamps();

			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
			$table->foreign('player_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
			$table->unique(['game_id', 'player_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('play_games');
    }
}
