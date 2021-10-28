<?php

namespace App\Http\Controllers;

use App\Models\BookedSlot;
use Illuminate\Http\Request;

class BookedSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookedSlot  $bookedSlot
     * @return \Illuminate\Http\Response
     */
    public function show(BookedSlot $bookedSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookedSlot  $bookedSlot
     * @return \Illuminate\Http\Response
     */
    public function edit(BookedSlot $bookedSlot)
    {
        //
    }

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
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookedSlot  $bookedSlot
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookedSlot $bookedSlot)
    {
        //
    }
}
