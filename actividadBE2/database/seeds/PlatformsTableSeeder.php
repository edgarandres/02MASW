<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platforms')->insert([
            ['name'=>'HBO Max'],
            ['name'=>'Netflix'],
            ['name'=>'Disney Plus'],
            ['name'=>'Youtube'],
            ['name'=>'Prime Video']
        ]);
    }
}
