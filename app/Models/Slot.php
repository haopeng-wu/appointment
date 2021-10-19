<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Slot extends Model
{
    use HasFactory;
    protected $guarded = [];
    /*
     * provides an array containing all the valid time slots in a format like '8:30 - 10:00'
     */
    static public function validSlots(){
        //$slots = ['8:30 - 10:00', '10:30 - 12:00', '14:30 - 16:00', '16:30 - 18:00'];
        $returnSlots = [];
        $all = Self::all();

        $temp_slot = '';
        $temp_time = '';
        foreach ($all as $item){
            if ($item['is_valid']){
                $temp_slot = '';
                $temp_time = substr($item['start_at'], 0, 5);
                $temp_slot .= $temp_time;
                $temp_slot .= ' - ';
                $temp_time = substr($item['end_at'], 0, 5);
                $temp_slot .= $temp_time;

                $returnSlots[$item->id] = $temp_slot;
            }
        }
        return $returnSlots;
    }

    static public function slotPrices(){
        $returnPrices = [];
        $all = Self::all();

        foreach ($all as $item){
            if ($item['is_valid']){
                $returnPrices[$item->id] = $item->price;
            }
        }
        return $returnPrices;
    }

    static public function slotDurations(){
        $returnDurations = [];
        $all = Self::all();

        foreach ($all as $item){
            if ($item['is_valid']){
                $returnDurations[$item->id] = $item->duration;
            }
        }
        return $returnDurations;
    }
}
