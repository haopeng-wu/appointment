<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //$slots = ['8:30 - 10:00', '10:30 - 12:00', '14:30 - 16:00', '16:30 - 18:00'];
    public function run()
    {
        //
        DB::table('slots')->insert([
            'start_at'=>Carbon::createFromTime(8,30),
            'end_at'=>Carbon::createFromTime(10,0),
            'duration'=>"01:30",
            'price'=>200000,
            'is_valid'=>true,
        ]);
        DB::table('slots')->insert([
            'start_at'=>Carbon::createFromTime(10,30),
            'end_at'=>Carbon::createFromTime(12,0),
            'duration'=>"01:30",
            'price'=>200000,
            'is_valid'=>true,
        ]);
        DB::table('slots')->insert([
            'start_at'=>Carbon::createFromTime(14,30),
            'end_at'=>Carbon::createFromTime(16,0),
            'duration'=>"01:30",
            'price'=>200000,
            'is_valid'=>true,
        ]);
        DB::table('slots')->insert([
            'start_at'=>Carbon::createFromTime(16,30),
            'end_at'=>Carbon::createFromTime(18,0),
            'duration'=>"01:30",
            'price'=>200000,
            'is_valid'=>true,
        ]);
        /*
         * for later use
         */
        DB::table('slots')->insert([
            'start_at'=>Carbon::createFromTime(0,0),
            'end_at'=>Carbon::createFromTime(0,0),
            'duration'=>"00:00",
            'price'=>"200000",
            'is_valid'=>false,
        ]);
        DB::table('slots')->insert([
            'start_at'=>Carbon::createFromTime(0,0),
            'end_at'=>Carbon::createFromTime(0,0),
            'duration'=>"00:00",
            'price'=>"200000",
            'is_valid'=>false,
        ]);
        DB::table('slots')->insert([
            'start_at'=>Carbon::createFromTime(0,0),
            'end_at'=>Carbon::createFromTime(0,0),
            'duration'=>"00:00",
            'price'=>"200000",
            'is_valid'=>false,
        ]);
        DB::table('slots')->insert([
            'start_at'=>Carbon::createFromTime(0,0),
            'end_at'=>Carbon::createFromTime(0,0),
            'duration'=>"00:00",
            'price'=>"200000",
            'is_valid'=>false,
        ]);
    }
}
