<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\BookableWeekday;
use App\Models\BookedSlot;
use App\Models\Slot;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function index(){
        $todays = Appointment::onTodayPaid();
        $tomorrows = Appointment::onTomorrowPaid();
        $theDayAfterTomorrows = Appointment::onTheDayAfterTomorrowPaid();
        $all = Appointment::latest()->get();
        $latest = $all[20];

        return view('admin-schedules',[
            'todays'=>$todays,
            'tomorrows'=>$tomorrows,
            'theDayAfterTomorrows'=>$theDayAfterTomorrows,
            'latest'=>$latest,
            'all'=>$all]);
    }

    public function dashboard(Request $request){
        $slots = Slot::all()->where('is_valid', '=', 1);
        $bookableFlags = BookableWeekday::allBookableFlags();

        $slotsForBooking = Slot::validSlots();
        $availableWeekdays = BookableWeekday::allIdMinusOne();
        $allFutureBooked = BookedSlot::allFutureBookedAppointments();

        return view('admin-dashboard', [
            'slots'=>$slots,
            'bookableFlags'=>$bookableFlags,
            'slotsForBooking'=>$slotsForBooking,
            'availableWeekdays'=>$availableWeekdays,
            'allFutureBooked'=>$allFutureBooked]);
    }
}