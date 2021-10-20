<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;



class BookableWeekday extends Model
{
    use HasFactory;
    protected $guarded = [];



    static public function getBookableIdMinusOne(){
        $ids = self::all()->where('is_bookable','=', 1)->pluck('id');
        dd($ids);
        $fun = function ($n){
            return ($n - 1);
        };
        $ids = array_map($fun, $ids);
        return $ids;
    }
}
