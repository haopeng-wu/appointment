<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class BookedSlot extends Model
{
    use HasFactory;
    protected $guarded=[];

    /*
     * seal the appointment so that the slot in that day cannot be selected in the front end
     */
    static public function sealTheAppointment($date, $slot_id){
        self::create([
            'date'=>$date,
            'slot_id'=>$slot_id
        ]);
    }

    /*
     *      $table->date('date');
            $table->foreignId('slot_id');
     */

    static public function allFutureBookedAppointments(){
        $returnArray = [];
        $all = self::all();
        $tempArray = [];
        foreach ($all as $item){
            //$returnArray[$item['date']] = $item['slot_id'];
            //array_push($tempArray, $item) ;
            //$returnArray[$item['date']] = [];
            array_push($returnArray[$item['date']], $item['slot_id']);
        }
        return $returnArray;
    }

    static public function checkIfBooked($date, $slot_id){
        return self::where('date','=',$date)
            ->where('slot_id','=',$slot_id)
            ->exists();
    }

    /*
     * release the slot in some cases like refund to set the slot available again
     */
    static public function releaseTheAppointment($date, $slot_id){
        self::where('date','=',$date)
            ->where('slot_id','=',$slot_id)
            ->delete();
    }
}
