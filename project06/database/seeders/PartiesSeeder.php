<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PartiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parties')->insert(
            [
                [
                    'name' => 'Party Zelda',
                    'game_id' => 5,
                    'user_id' => 4,
                ],

                [
                    'name' => 'Party Metroid',
                    'game_id' => 6,
                    'user_id' => 1,
                ],

                [
                    'name' => 'Party Hook',
                    'game_id' => 4,
                    'user_id' => 1,
                ],

                [
                    'name' => 'Party Mario Bros 3',
                    'game_id' => 1,
                    'user_id' => 3,
                ],

                [
                    'name' => 'Party Ghosts and Goblins',
                    'game_id' => 2,
                    'user_id' => 2,
                ],

                [
                    'name' => 'Contra',
                    'game_id' => 3,
                    'user_id' => 6,
                ],

            ]
        );
    }
}
