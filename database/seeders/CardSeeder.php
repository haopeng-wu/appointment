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
			["name"=>"villager","chinese_name"=>"村名", "portrait"=>"civilian.jpeg"],
			["name"=>"wolf","chinese_name"=>"狼人", "portrait"=>"wolf.jpeg"],
			["name"=>"prophet","chinese_name"=>"预言家", "portrait"=>"prophet.jpeg"],
			["name"=>"witch","chinese_name"=>"女巫", "portrait"=>"witch.jpeg"],
			["name"=>"hunter","chinese_name"=>"猎人", "portrait"=>"hunter.jpeg"],
			["name"=>"idiot","chinese_name"=>"白痴", "portrait"=>"idiot.jpeg"],
			["name"=>"guardian","chinese_name"=>"守卫", "portrait"=>"guardian.jpeg"],
			["name"=>"knight","chinese_name"=>"骑士", "portrait"=>"knight.jpeg"],
			["name"=>"white-wolf-king","chinese_name"=>"白狼王", "portrait"=>"white-wolf-king.jpeg"],
			["name"=>"wolf-king","chinese_name"=>"狼王", "portrait"=>"wolf-king.jpeg"],
		]);
        //
    }
}
