<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlatformsTableSeeder::class);
        $this->call(DirectorsTableSeeder::class);
        $this->call(ActorsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        DB::table('users')->insert([
            [   'name'=>'viu',
                'email'=>'viu@viu.com',
                'password'=>Hash::make('Contraseña')
            ]
        ]);
    }
}
