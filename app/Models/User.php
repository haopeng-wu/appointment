<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Game;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

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
        $this->hasMany(PlayGame::class, 'player_id')->update(['enter_game_at'=>Carbon::now()]);
        # set the user_id cookies
        $minutes=60*1.5;  # remember a room for a user for one hour and a half
        Cookie::queue('roomId', $roomId, $minutes);
        return ;
    }

    public function currRoomId(){
        $play_game = DB::table('play_games')
            ->where('player_id', '=', $this->id)
            ->where('enter_game_at', '>', now()->subMinutes(60*1.5))
            ->orderByDesc('enter_game_at')
            ->first();
        if($play_game){
            return $play_game->game_id;
        }else{
            return null;
        }
    }

    public function currRolId(int $room_id){
        $play_game = DB::table('play_games')
            ->where('player_id','=', $this->id)
            ->where('game_id', '=', $room_id)
            ->first();
        if(
            $play_game->card_id
            and $play_game->set_role_at
            and $play_game->set_role_at > now()->subMinutes(60*1.5)
        ){
            return $play_game->card_id;
        }else{
            return null;
        }
    }
}
