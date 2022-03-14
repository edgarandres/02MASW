<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon; //usar date o Carbon::create('2000', '01', '01') ???

class DirectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directors')->insert([
            [
                'given_name'=>'Quentin',
                'surnames'=>'Tarantino',
                'country'=>'USA',
                'birth_date'=>date('1963-03-27')
            ],
            [
                'given_name'=>'Martin',
                'surnames'=>'Scorsese',
                'country'=>'USA',
                'birth_date'=>date('1942-11-17')
            ],
            [
                'given_name'=>'Steven',
                'surnames'=>'Spielberg',
                'country'=>'USA',
                'birth_date'=>date('1946-12-18')
            ],
            [
                'given_name'=>'David',
                'surnames'=>'Chase',
                'country'=>'USA',
                'birth_date'=>date('1945-09-22')
            ],
            [
                'given_name'=>'Alan',
                'surnames'=>'Taylor',
                'country'=>'USA',
                'birth_date'=>date('1963-03-27')
            ],
            [
                'given_name'=>'Anthony',
                'surnames'=>'Russo',
                'country'=>'USA',
                'birth_date'=>date('1970-02-03')
            ],
            [
                'given_name'=>'Alejandro Fernando',
                'surnames'=>'Amenábar Cantos',
                'country'=>'Chile',
                'birth_date'=>date('1972-03-31')
            ]
        ]);
    }
}
