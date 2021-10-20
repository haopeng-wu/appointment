<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BookableWeekdaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slots')->insert([
            'name'=>'Monday',
            'is_bookable'=>0,
        ]);
        DB::table('slots')->insert([
            'name'=>'Tuesday',
            'is_bookable'=>0,
        ]);
        DB::table('slots')->insert([
            'name'=>'Wednesday',
            'is_bookable'=>0,
        ]);
        DB::table('slots')->insert([
            'name'=>'Thursday',
            'is_bookable'=>0,
        ]);
        DB::table('slots')->insert([
            'name'=>'Friday',
            'is_bookable'=>1,
        ]);
        DB::table('slots')->insert([
            'name'=>'Saturday',
            'is_bookable'=>1,
        ]);
        DB::table('slots')->insert([
            'name'=>'Sunday',
            'is_bookable'=>1,
        ]);
    }
}
