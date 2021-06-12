<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\PlayGame;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class PlayGameController extends Controller
{
    /**
     * shuffle cards for a game and distribute them.
     *
     * @return \Illuminate\Http\Response
     */

    public function shuffleNew(int $roomId)
    {
        /*
         * check if the room has enough players
         */
        # get the set total of players of the room
        $game = Game::find($roomId);
        $setTotal = $game->total;

        # get the player ids that entered the room within the last one hour
        $game_plays = Game::find($roomId)->hasMany(PlayGame::class);
        # get the total of players that entered the room within the last one hour and a half
        $total = $game_plays->where('enter_game_at', '>', now()->subMinutes(90))->get()->pluck('player_id')->count();

        /*
         *  an alternative to the above
         */
        #$total = $game->users()->where('enter_game_at', '>', now()->subHour())->count();

        # check if the room has enough players
        if ($total < $setTotal){
            return view('game.error', ['error'=>"有玩家还未进房！"]);
        }

        $warning="";
        if($total > $setTotal){
            # more player want to play. Maybe need a reset of the game
            $warning='实际参与人数大于房间设定。';
        }

        /*
         * get all the cards of the room into an array
         */
        $card_ids=[];
        $room=Game::find($roomId);
        $card_types=['villager','wolf','prophet','guardian','hunter',
            'witch','knight','wolf-king','white-wolf-king'];
        foreach ($card_types as $attr){
            $card_type_id = Card::where('name', $attr)->first()->id;
            $card_type_count = $room[$attr];
            for ($i=0; $i < $card_type_count; $i++){
                array_push($card_ids, $card_type_id);
            }
        }
        # shuffle the cards
        shuffle($card_ids);
        $card_names=[];
        foreach ($card_ids as $card_id) {
            array_push($card_names, Card::find($card_id)->name);
        }

        # distribute the cards to its players
        $distribution=[];
        $player_ids = $game_plays->orderBy('enter_game_at', 'desc')->pluck('player_id')->take($setTotal);
        foreach ($player_ids as $index => $player_id) {
            $room->assignRole($player_id, $card_ids[$index]);
            $distribution[$player_id] = $card_names[$index];
        }
        return view('game.playing',['dist'=>$distribution]);
    }

    public function shuffle(Request $request){
        return $this->shuffleNew($request['_roomId']);
    }

    /**
     * Enter a game.
     *
     * @return \Illuminate\Http\Response
     */
    public function enter(Request $request)
    {
        $attributes=request()->validate(["roomId"=>["numeric","nullable"]]);
        if(request('roomId')){
            $roomId=$attributes['roomId'];

            $user=loginOrCreate();

            # enter the room
            if (Game::find($roomId)){
                $user->enterRoom($roomId);
                return view("game.room", ["room"=>Game::find($roomId), "user"=>$user]);
            }else{
                return view("game.error", ["error"=>"该房间不存在！"]);
            }
        }
        return view("game.error");
    }

    public function showRole(Request $request){
        $u_id_cookie = $request->cookie('user_id');
        if ($u_id_cookie and ! $user = User::find($u_id_cookie)){
            return view("game.error", ["error"=>"还未进入房间哦！"]);
        }
        if(! $room_id = $user->currRoomId()){
            return view("game.error", ["error"=>"还未进入房间哦！"]);
        }
        if(! $role_id = $user->currRollId($room_id)){
            return view("game.error", ["error"=>"主持人暂未分发身份牌！"]);
        }
        $role = Card::find($role_id);

        return view('game.role', ['role'=>$role]);
    }
}
