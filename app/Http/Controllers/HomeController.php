<?php

namespace App\Http\Controllers;

use App\Models\BookableWeekday;
use App\Models\BookedSlot;
use App\Models\Slot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        $slots = Slot::validSlots();
        $_durations = Slot::slotDurations();    // this yields duration like 1:30 instead of what we need like 90min
        $tmpArray = [];
        $durations = [];
        foreach ($_durations as $key => $value){
            if ($key==0) continue;
            $tmpArray = explode(':', '$value');
            $durations[$key] = intval($tmpArray[0])*60 + intval($tmpArray[1]);
        }
        $availableWeekdays = BookableWeekday::allIdMinusOne();
        $allFutureBooked = BookedSlot::allFutureBookedAppointments();
        return view('home', [
            'slots'=>$slots,
            'durations'=>$durations,
            'availableWeekdays'=>$availableWeekdays,
            'allFutureBooked'=>$allFutureBooked]);
    }
}