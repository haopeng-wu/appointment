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
        DB::table('bookable_weekdays')->insert([
            'name'=>'Monday',
            'is_bookable'=>0,
        ]);
        DB::table('bookable_weekdays')->insert([
            'name'=>'Tuesday',
            'is_bookable'=>0,
        ]);
        DB::table('bookable_weekdays')->insert([
            'name'=>'Wednesday',
            'is_bookable'=>0,
        ]);
        DB::table('bookable_weekdays')->insert([
            'name'=>'Thursday',
            'is_bookable'=>0,
        ]);
        DB::table('bookable_weekdays')->insert([
            'name'=>'Friday',
            'is_bookable'=>1,
        ]);
        DB::table('bookable_weekdays')->insert([
            'name'=>'Saturday',
            'is_bookable'=>1,
        ]);
        DB::table('bookable_weekdays')->insert([
            'name'=>'Sunday',
            'is_bookable'=>1,
        ]);
    }
}
