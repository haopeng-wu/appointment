<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
	protected $guarded=[];
    use HasFactory;

	public function founder(){
		return $this->belongsTo(User::class, 'founder_id');
	}

	public function host(){
		return $this->belongsTo(User::class, 'host_id');
	}

	public function players(){
		return $this->hasMany(PlayGame::class, 'game_id');
	}

	public function assignRole(int $player_id, int $role_id){
        DB::table('play_games')
            ->where('game_id','=',$this->id)
            ->where('player_id', '=', $player_id)
            ->update(['card_id'=>$role_id]);

	    DB::table('play_games')
            ->where('game_id','=',$this->id)
            ->where('player_id', '=', $player_id)
            ->update(['set_role'=>Carbon::now()]);
    }
}
