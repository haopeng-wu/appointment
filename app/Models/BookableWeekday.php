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
        $ids = self::all()->pluck('id');
        function minusOne($n){
            return ($n - 1);
        }
        $ids = array_map('minusOne', $ids);
        return $ids;
    }
}
