<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;



class BookableWeekday extends Model
{
    use HasFactory;
    protected $guarded = [];

    static public function allIdMinusOne(){
        $ids = self::all()->where('is_bookable','=', 1)->pluck('id')->toArray();
        $fun = function ($n){
            return ($n - 1);
        };
        $ids = array_map($fun, $ids);
        return $ids;
    }

    static public function allBookableFlags(){
        $all = self::all();
        $bookableFlags = [];
        foreach ($all as $item){
            $bookableFlags[$item['id']] = $item['is_bookable'];
        }
        return $bookableFlags;
    }

    static public function allBookableDayFlags(){
        $all = self::all();
        $bookableFlags = [];
        foreach ($all as $item){
            $bookableFlags[$item['name']] = $item['is_bookable'];
        }
        return $bookableFlags;
    }
}
