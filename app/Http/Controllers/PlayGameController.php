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
        # get the user_id
        $user_id=0;
        if ($request->cookie('user_id')){
            $u_id=$request->cookie('user_id');
            $str="您已登陆，您的用户id是".$u_id;
            $user_id=$u_id;
            #return $str;
        }else{
            # first create this user
            $user=User::create();
            # set the user_id cookies
            $minutes=30*24*60;  # remember a user for a month
            $user_id=$user->id;
            Cookie::queue('user_id', $user->id, $minutes);
        }
        # get the room id
        $roomId=$request['_roomId'];
        # get all the cards
        $card_ids=Card::all()->pluck('id');
        # shuffle the cards
        $card_array = (array)$card_ids;
        shuffle($card_array);
        # pick the first one for the user
        $card_id=$card_ids[0];
        $card_name=Card::find($card_id);

        PlayGame::create(['game_id'=>$roomId, 'player_id'=>$user_id, 'card_id'=>$card_id]);
        return "你的身份牌是：".$card_name.";用户号是："."$user_id".";房间名是：".$roomId;

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
            }

            return view("game.room", ["roomId"=>$roomId]);
        }
        #return "You didn't enter a room number";
        return view("game.enter-error");
    }
}
