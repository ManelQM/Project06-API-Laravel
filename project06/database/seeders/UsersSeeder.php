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
                'email' => 'virgilio@gmail.com',
                'password' => 'virgilio1234',
                'rol' => 1,
            ],

            [
                'name' => 'Seneca',
                'nickname' => 'Sen',
                'email' => 'seneca@gmail.com',
                'password' => 'seneca1234',
                'rol' => 0
            ],

            [
                'name' => 'Caligula',
                'nickname' => 'Gula',
                'email' => 'caligula@gmail.com',
                'password' => 'caligula1234',
                'rol' => 1,
            ],

            [
                'name' => 'Neron',
                'nickname' => 'Nero',
                'email' => 'neron@gmail.com',
                'password' => 'neron1234',
                'rol' => 0,
            ],

            [
                'name' => 'Tiberio',
                'nickname' => 'Tib',
                'email' => 'tiberio@gmail.com',
                'password' => 'tiberio1234',
                'rol' => 0,
            ],
            
            [
                'name' => 'Plotino',
                'nickname' => 'Tino',
                'email' => 'plotino@gmail.com',
                'password' => 'plotino1234',
                'rol' => 0,
            ],

            ]);
    }
}
