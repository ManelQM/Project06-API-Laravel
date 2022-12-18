<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersPartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_parties')->insert(
            [
                [
                    'user_id' => 2,
                    'party_id' => 1,
                ],
                [
                    'name' => 'Hello',
                    'id_game' => 2,
                ],

                [
                    'user_id' => 3,
                    'id_game' => 4,
                ],

                [
                    'name' => 'Cat',
                    'id_game' => 5,
                ],
            ]
        );
    }
}
