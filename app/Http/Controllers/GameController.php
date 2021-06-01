<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                $str="您已登陆，您的用户id是"+$user_id;
                return $str;
            }else{
                # first create this user
                $user=User::create();
                # generate the user_id cookies
                $minutes=30*24*60;  # remember a user for a month
                $cookie = cookie('user_id', $user->id, $minutes);
                return response("您未登录")->cookie($cookie);
            }

            return view("game.room",["roomId"=>$roomId]);
        }
        #return "You didn't enter a room number";
        return view("game.enter-error");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            "total"=>['required', 'numeric', 'max:15', 'min:4'],
            "villager"=>['required', 'numeric', 'max:15', 'min:1'],
            "wolf"=>['required','numeric', 'max:15', 'min:1'],
            "witch"=>['nullable','numeric', 'max:1', 'min:0'],
            "hunter"=>['nullable','numeric', 'max:1', 'min:0'],
            "prophet"=>['nullable','numeric', 'max:1', 'min:0'],
            "guardian"=>['nullable','numeric', 'max:1', 'min:0'],
            "knight"=>['nullable','numeric', 'max:1', 'min:0'],
            "wolf-king"=>['nullable','numeric', 'max:1', 'min:0'],
            "white-wolf-king"=>['nullable','numeric', 'max:1', 'min:0']
        ]);
        $game=Game::create($attributes);
        return view("game.created", ["gameId"=>$game->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
