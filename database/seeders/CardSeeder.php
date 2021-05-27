<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('cards')->insert([
			["name"=>"villager","chinese_name"=>"村名"],
			["name"=>"wolf","chinese_name"=>"狼人"],
			["name"=>"prophet","chinese_name"=>"预言家"],
			["name"=>"witch","chinese_name"=>"女巫"],
			["name"=>"hunter","chinese_name"=>"猎人"],
			["name"=>"idiot","chinese_name"=>"白痴"],
			["name"=>"guardian","chinese_name"=>"守卫"],
			["name"=>"knight","chinese_name"=>"骑士"],
			["name"=>"white-wolf-king","chinese_name"=>"白狼王"],
			["name"=>"wolf-king","chinese_name"=>"狼王"],
		]);
        //
    }
}
