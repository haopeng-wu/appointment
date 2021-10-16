<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function nearestTenFuturePaid(){

    }

    public static function lastestTen(){

    }

    public static function lastestPaidedTen(){

    }

    public static function onToday(){
        dd($this::where('date','=',"2021-10-10")->get());
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
