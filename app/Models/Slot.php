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
    public function validSlots(){
        //$slots = ['8:30 - 10:00', '10:30 - 12:00', '14:30 - 16:00', '16:30 - 18:00'];
        $returnSlots = [];
        $all = Self::all();

        $temp = '';
        foreach ($all as $item){
            if ($item['is_valid']){
                dd($item['start_at']);
                $item = $item['start_at'].' - '.$item['end_at'];
            }
        }
    }
}
