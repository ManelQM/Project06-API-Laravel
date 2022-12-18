<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert(
            [
                [
                    'message' => 'Hola!, ¿seguimos con la partida al Contra?',
                    'user_id' => 1,
                    'party_id' => 1,
                ],

                [
                    'message' => 'Me gusta mucho la banda sonora del Zelda',
                    'user_id' => 1,
                    'party_id' => 2,
                ],

                [
                    'message' => 'Que recuerdos, este me lo compró mi abuela',
                    'user_id' => 1,
                    'party_id' => 2,
                ],

                [
                    'message' => 'No hay de futbol!!',
                    'user_id' => 1,
                    'party_id' => 2,
                ],

            ]
        );
    }
}
