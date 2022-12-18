<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class PartyController extends Controller
{

                // NEW PARTY
    public function createParty(Request $request)
    
        {
            Log::info('Create Party');

            try {
                $validator = Validator::make($request->all(),[
                    'name'=> 'required|max:225',
                    'game_id' => 'required',
                ]);

                if($validator->fails()){
                    return response([
                        'success' => false,
                        'message' => $validator->messages()
                    ], 400);
                }

                $name = $request->input('name');
                $game_id = $request->input('game_id');
                $user_id = auth()->user()->id;
                $newParty = new Party();
                $newParty->name = $name;
                $newParty->game_id = $game_id;
                $newParty->user_id = $user_id;
                $newParty->save();

                return response([
                        'success' => true, 
                        'message' => 'Created New Party',
                        'data' => $newParty,
                ], 200);
            } catch (\Throwable $th) {

                Log::error($th->getMessage());

                return response([
                    'success' => false,
                    'message' => 'Cant create New Party'
                ], 500);
            }

        }

    }

