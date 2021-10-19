<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function isBookedAndPiad($date, $which_slot){
        return self::where('date','=',$date)->where('which_slot','=',$which_slot)->where('payment_status','=','1')->first();
    }

    public static function nearestTenFuturePaid(){

    }

    public static function lastestTen(){

    }

    public static function lastestPaidedTen(){

    }

    public static function onToday(){
        return self::where('date','=',substr(Carbon::today(),0,10))->orderBy('start_end_time')->get();
    }

    public static function onTodayPaid(){
        return self::where('date','=',substr(Carbon::today(),0,10))->where('payment_status','=', '1')->orderBy('start_end_time')->get();
    }

    public static function onTomorrowPaid(){
        return self::where('date','=',substr(Carbon::today()->addDays(1),0,10))->where('payment_status','=', '1')->orderBy('start_end_time')->get();
    }

    public static function onTheDayAfterTomorrowPaid(){
        return self::where('date','=',substr(Carbon::today()->addDays(2),0,10))->where('payment_status','=', '1')->orderBy('start_end_time')->get();
    }

    public static function onTomorrow(){

    }

    public static function onTheDayAfterTomorrow(){

    }

    public static function allOnThisDate(){

    }

    public static function lookupByEmail(){

    }

    public static function lookupByCustomerName(){

    }
}
