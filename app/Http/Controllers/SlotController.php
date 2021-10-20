<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SlotController extends Controller
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $slot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attributes = request()->validate([
            'start_at'=>['required','date_format:H:i'],
            'end_at'=>['required','date_format:H:i'],
            'price'=>['required', 'numeric', 'min:100'],
            'id'=>['required', 'numeric', 'min:1']
        ]);
        $attributes['duration'] = Carbon::make($attributes['start_at'])
            ->diff(Carbon::make($attributes['end_at']))
            ->format('%H:%i');

        $slot = Slot::find($attributes['id']);
        $slot->start_at = $attributes['start_at'];
        $slot->end_at = $attributes['end_at'];
        $slot->price = $attributes['price'];
        $slot->duration = $attributes['duration'];
        $slot->save();

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slot $slot)
    {
        //
    }
}
