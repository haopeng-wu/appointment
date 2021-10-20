<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        $slots = Slot::validSlots();
        $availableWeekdays = [5,6,0];
        return view('home', ['slots'=>$slots, 'availableWeekdays'=>$availableWeekdays]);
    }
}