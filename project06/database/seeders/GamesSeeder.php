<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            [
                'title' => 'Mario Bros 3',
                't_url' => 'https//mariobros3.com',
                'url' => "https//mariobros32.com",
                'user_id' => 3,
            ],

            [
                'title' => 'Ghosts and Goblins',
                't_url' => 'https//ghostsandgoblins.com',
                'url' => "https//ghostsandgoblins2.com",
                'user_id' => 2,
            ],

            [
                'title' => 'Contra',
                't_url' => 'https//contra.com',
                'url' => "https//contrados.com",
                'user_id' => 4,
            ],

            [
                'title' => 'Hook',
                't_url' => 'https//hook.com',
                'url' => "https//hook2.com",
                'user_id' => 1 ,
            ],

            [
                'title' => 'Zelda',
                't_url' => 'https//zelda.com',
                'url' => "https//zelda2.com",
                'user_id' => 1 ,
            ],
            
            [
                'title' => 'Metroid',
                't_url' => 'https//metroid.com',
                'url' => "https//metroid2.com",
                'user_id' => 5,
            ],

            ]);
    }
}
