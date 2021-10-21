<?php

namespace App\Http\Controllers;

use App\Models\BookableWeekday;
use Illuminate\Http\Request;

class BookableWeekdayController extends Controller
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
     * @param  \App\Models\BookableWeekday  $bookableWeekday
     * @return \Illuminate\Http\Response
     */
    public function show(BookableWeekday $bookableWeekday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookableWeekday  $bookableWeekday
     * @return \Illuminate\Http\Response
     */
    public function edit(BookableWeekday $bookableWeekday)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookableWeekday  $bookableWeekday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attributes = $request->validate([
            'Monday'=>['in:on'],
            'Tuesday'=>['in:on'],
            'Wednesday'=>['in:on'],
            'Thursday'=>['in:on'],
            'Friday'=>['in:on'],
            'Saturday'=>['in:on'],
            'Sunday'=>['in:on'],
        ]);
        BookableWeekday::all()->update(['is_bookable'=>1]);
        foreach ($attributes as $key => $item){
            if($item == 'on'){
                BookableWeekday::where('name', '=', $key)
                    ->update(['is_bookable'=>1]);
            }
        }
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookableWeekday  $bookableWeekday
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookableWeekday $bookableWeekday)
    {
        //
    }
}
