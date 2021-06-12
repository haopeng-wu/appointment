<?php


namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\User;
use App\Models\PlayGame;
use Illuminate\Http\Request;

class HostController extends Controller
{
    public function host(){
        return "you're a host now";
    }
}