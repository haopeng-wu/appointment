<?php

namespace App\Http\Controllers;

use App\Models\BookedSlot;
use Illuminate\Http\Request;

class BookedSlotController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookedSlot  $bookedSlot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attributes = $request->validate(
            ['date' => ["required",'date'],
            'which_slot' => ["required"]]
        );
        $date = $attributes['date'];
        $slot = $attributes['which_slot'];
        if (!BookedSlot::checkIfBooked($date, $slot)){
            BookedSlot::sealTheAppointment($date, $slot);
        }
        return redirect(route('dashboard'));
    }
}
