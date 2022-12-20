<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                "name"=>"Cesar Augusto",
                "nickname"=>"Caesar",
                "email"=>"cesar@mail.com",
                "password"=>"cesar1234",
                "rol"=>false

            ],

            [
                "name"=>"Ciceron",
                "nickname"=>"Cice",
                "email"=>"ciceron@mail.com",
                "password"=>"ciceron1234",
                "rol"=>false

            ],

            [
                "name"=>"Caligula",
                "nickname"=>"Gula",
                "email"=>"caligula@mail.com",
                "password"=>"caligula1234",
                "rol"=>true

            ],

            [
                "name"=>"Nerón",
                "nickname"=>"Nero",
                "email"=>"neron@mail.com",
                "password"=>"neron1234",
                "rol"=>false

            ],

            [
                "name"=>"Tiberio",
                "nickname"=>"Tibe",
                "email"=>"tiberio@mail.com",
                "password"=>"tiberio1234",
                "rol"=>false

            ],

            [
                "name"=>"Plotino",
                "nickname"=>"Tino",
                "email"=>"plotino@mail.com",
                "password"=>"plotino1234",
                "rol"=>false

            ],

            [
                "name"=>"Seneca",
                "nickname"=>"Sene",
                "email"=>"seneca@mail.com",
                "password"=>"seneca1234",
                "rol"=>false

            ],


        ]);
    }
}
