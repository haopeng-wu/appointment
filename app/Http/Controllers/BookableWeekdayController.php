<?php

namespace App\Http\Controllers;

use App\Models\BookableWeekday;
use Illuminate\Http\Request;

class BookableWeekdayController extends Controller
{
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
        BookableWeekday::where('id','>', 0)->update(['is_bookable'=>0]);
        foreach ($attributes as $key => $item){
            if($item == 'on'){
                BookableWeekday::where('name', '=', $key)
                    ->update(['is_bookable'=>1]);
            }
        }
        return redirect(route('dashboard'));
    }

}
