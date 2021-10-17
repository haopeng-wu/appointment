<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Slot extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function validSlots(){
        //$slots = ['8:30 - 10:00', '10:30 - 12:00', '14:30 - 16:00', '16:30 - 18:00'];
        $slots = [];
        $all = Self::all();

        $temp = '';
        foreach ($all as $item){
            if ($item['is_valid']){
                $item = $item['start_at'].' - '.$item['end_at'];
            }
        }
    }
}
