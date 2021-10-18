<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

class AdminDashController extends Controller
{
    public function index(){
        $todays = Appointment::onTodayPaid();
        return view('admin-schedules',['todays'=>$todays]);
    }
}