<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

function minusOne($n){
    return ($n - 1);
}

class BookableWeekday extends Model
{
    use HasFactory;
    protected $guarded = [];



    static public function getBookableIdMinusOne(){
        $ids = self::all()->where('is_bookable','=', 1)->pluck('id');

        $ids = array_map('minusOne', $ids);
        return $ids;
    }
}
