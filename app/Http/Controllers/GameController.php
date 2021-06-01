<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\PlayGame;
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
