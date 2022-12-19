<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Ciceron',
                'nickname' => 'Cice',
                'email' => 'ciceron@gmail.com',
                'password' => 'ciceron1234',
            ],

            [
                'name' => 'Seneca',
                'nickname' => 'Se',
                'email' => 'seneca@gmail.com',
                'password' => 'seneca1234',
            ],

            [
                'name' => 'Caligula',
                'nickname' => 'Gula',
                'email' => 'caligula@gmail.com',
                'password' => 'caligula1234',
            ],

            [
                'name' => 'Neron',
                'nickname' => 'Nero',
                'email' => 'neron@gmail.com',
                'password' => 'neron1234',
            ],

            [
                'name' => 'Tiberio',
                'nickname' => 'Tib',
                'email' => 'tiberio@gmail.com',
                'password' => 'tiberio1234',
            ],
            
            [
                'name' => 'Plotino',
                'nickname' => 'Tino',
                'email' => 'plotino@gmail.com',
                'password' => 'plotino1234',
            ],

            ]);
    }
}
