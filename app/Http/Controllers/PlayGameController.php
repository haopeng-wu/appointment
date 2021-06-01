<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\PlayGame;
use App\Models\Card;
use Illuminate\Http\Request;

class PlayGameController extends Controller
{
    /**
     * shuffle cards for a game and distribute them.
     *
     * @return \Illuminate\Http\Response
     */
    public function shuffle(Request $request)
    {
        # get the room id
        $roomId=$request['_roomId'];
        # get all the cards
        $card_ids=Card::all()->pluck('id');
        # shuffle the cards
        shuffle($card_ids);
        # pick the first one for the user
        $card_id=$card_ids[0];
        $card_name=Card::find($card_id);

        $user_id=$request->cookie('user_id');
        $user=User::find($user_id);
        PlayGame::create(['game_id'=>$roomId, 'player_id'=>$user_id, 'card_id'=>$card_id]);
        return "你的身份牌是".$card_name;

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
            #check the cookies to decide whether this is an existing user
            /*
             * cookies:
             * user_id
             */
            if ($request->cookie('user_id')){
                $user_id=$request->cookie('user_id');
                $str="您已登陆，您的用户id是".$user_id;
                #return $str;
            }else{
                # first create this user
                $user=User::create();

                # set the user_id cookies
                $minutes=30*24*60;  # remember a user for a month
                $cookie = cookie('user_id', $user->id, $minutes);

                # take the user to the game
                #$user->playGame(Game::find($roomId));
                # set the
                #return response("欢迎新用户！")->cookie($cookie);
            }

            return view("game.room", ["roomId"=>$roomId]);
        }
        #return "You didn't enter a room number";
        return view("game.enter-error");
    }
}
