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

        public function newUserToParty($id)
            
            {
                try{
                    $user_id = auth()->user()->id;
                    $party_id = $id; 
                    $party = Party::find($party_id);

                    if(!$party){
                        return response()->json([
                            'success'=> true,
                            'message'=> 'Cant add new user to party',
                        ], 400);
                    }

                    DB::table('user_party')->insert([
                        'party_id' => $party_id,
                        'user_id' => $user_id,
                    ]);

                    return response()->json([
                        'success' => true,
                        'message' => 'New User added to the Party',
                    ], 200);
                }catch (\Throwable $th){

                    Log::error('Error adding new user', $th->getMessage());

                    return response()->json([
                        'success' => false,
                        'message' => 'I dont know what happens here...Error',
                    ], 500);
                }

            }

    }

