<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

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

    public function dashboard(){
        return view('admin-dashboard');
    }
}