<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Game;
use Illuminate\Support\Facades\DB;
        


    class GamesController extends Controller
    {
        // PARTIES FROM GAME 
        public function getPartiesGame($id) 
        {
            Log::info('Game Parties search');

        try{
            $parties = DB::table('parties')->where('game_id', '=', $id)->get();

            return response([
                'success' => true,
                'message' => 'All parties from the game list',
                'data' => $parties,
            ], 200);

        }catch (\Throwable $th) {

            return response([
                'success' => false,
                'message' => 'Cant get game parties', 
            ], 500);

        }
      }
    }
