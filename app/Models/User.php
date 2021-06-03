<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Game;
use Illuminate\Support\Facades\Cookie;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function hostedGames(){
		return $this->hasMany(Game::class, 'host_id');
	}

	public function foundedGames(){
		return $this->hasMany(Game::class, 'founder_id');
	}

	/*
    public function playedGames(){
        return $this->belongsToMany(Game::class, 'play_games', 'player_id');
    }

    public function playGame(Game $game){
        return $this->belongsToMany(Game::class, 'play_games', 'player_id')->attach($game);
    }
	*/

    public function enterRoom($roomId){
        # store it in the database
        $this->hasMany(PlayGame::class, 'player_id')->updateOrCreate(['game_id'=>$roomId]);
        $this->hasMany(PlayGame::class, 'player_id')->touch();
        # set the user_id cookies
        $minutes=30*24*60;  # remember a user for a month
        Cookie::queue('roomId', $roomId, $minutes);
        return ;
    }

}
