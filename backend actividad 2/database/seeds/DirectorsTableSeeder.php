<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
            'given_name'=>Str::random(10),
            'surnames'=>Str::random(10),
            'country'=>Str::random(4),
            'birth_date'=>now()->endOfDay()
        ]);
    }
}
