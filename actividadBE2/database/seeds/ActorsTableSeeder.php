<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors')->insert([
            [
                'given_name'=>'Javier',
                'surnames'=>'Bardem',
                'country'=>'Spain',
                'birth_date'=>date('1969-03-01')
            ],
            [
                'given_name'=>'Antonio',
                'surnames'=>'Banderas',
                'country'=>'Spain',
                'birth_date'=>date('1960-08-10')
            ],
            [
                'given_name'=>'Will',
                'surnames'=>'Smith',
                'country'=>'USA',
                'birth_date'=>date('1968-09-25')
            ],
            [
                'given_name'=>'Benedict',
                'surnames'=>'Cumberbatch',
                'country'=>'USA',
                'birth_date'=>date('1976-07-19')
            ],
            [
                'given_name'=>'Tom',
                'surnames'=>'Hanks',
                'country'=>'USA',
                'birth_date'=>date('1956-07-09')
            ],
            [
                'given_name'=>'Jack',
                'surnames'=>'Nicholson',
                'country'=>'USA',
                'birth_date'=>date('1937-04-22')
            ]
        ]);
    }
}
