<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'given_name'=>'admin',
            'family_name'=>'admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('Y@jd8*C')
        ]);
    }
}
