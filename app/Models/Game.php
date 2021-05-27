<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
