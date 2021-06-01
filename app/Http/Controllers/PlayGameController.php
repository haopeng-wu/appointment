<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\PlayGame;
use Illuminate\Http\Request;

class PlayGameController extends Controller
{
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
