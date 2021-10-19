<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Slot;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function index(){
        $todays = Appointment::onTodayPaid();
        $tomorrows = Appointment::onTomorrowPaid();
        $theDayAfterTomorrows = Appointment::onTheDayAfterTomorrowPaid();
        return view('admin-schedules',[
            'todays'=>$todays,
            'tomorrows'=>$tomorrows,
            'theDayAfterTomorrows'=>$theDayAfterTomorrows]);
    }

    public function dashboard(Request $request){
        $slots = Slot::all();
        return view('admin-dashboard', ['slots'=>$slots]);
    }
}