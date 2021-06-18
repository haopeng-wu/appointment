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
			["name"=>"villager","chinese_name"=>"村名", "portrait"=>"civilian.jepg"],
			["name"=>"wolf","chinese_name"=>"狼人", "portrait"=>"wolf.jepg"],
			["name"=>"prophet","chinese_name"=>"预言家", "portrait"=>"prophet.jepg"],
			["name"=>"witch","chinese_name"=>"女巫", "portrait"=>"witch.jepg"],
			["name"=>"hunter","chinese_name"=>"猎人", "portrait"=>"hunter.jepg"],
			["name"=>"idiot","chinese_name"=>"白痴", "portrait"=>"idiot.jepg"],
			["name"=>"guardian","chinese_name"=>"守卫", "portrait"=>"guardian.jepg"],
			["name"=>"knight","chinese_name"=>"骑士", "portrait"=>"knight.jepg"],
			["name"=>"white-wolf-king","chinese_name"=>"白狼王", "portrait"=>"white-wolf-king.jepg"],
			["name"=>"wolf-king","chinese_name"=>"狼王", "portrait"=>"wolf-king.jepg"],
		]);
        //
    }
}
