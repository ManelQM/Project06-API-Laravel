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
                'email' => 'virgilio@gmail.com',
                'password' => 'virgilio1234',
            ],

            [
                'name' => 'Seneca',
                'email' => 'seneca@gmail.com',
                'password' => 'seneca1234',
            ],

            [
                'name' => 'Caligula',
                'email' => 'caligula@gmail.com',
                'password' => 'caligula1234',
            ],

            [
                'name' => 'Neron',
                'email' => 'neron@gmail.com',
                'password' => 'neron1234',
            ],

            [
                'name' => 'Tiberio',
                'email' => 'tiberio@gmail.com',
                'password' => 'tiberio1234',
            ],
            
            [
                'name' => 'Plotino',
                'email' => 'plotino@gmail.com',
                'password' => 'plotino1234',
            ],

            ]);
    }
}
