<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'name'=>'Spanish',
                'iso_code'=>'es'
            ],
            [
                'name'=>'English',
                'iso_code'=>'en'
            ],
            [
                'name'=>'Deutsch',
                'iso_code'=>'de'
            ],
            [
                'name'=>'Ukrainian',
                'iso_code'=>'uk'
            ],
            [
                'name'=>'French',
                'iso_code'=>'fr'
            ]
        ]);
    }
}
