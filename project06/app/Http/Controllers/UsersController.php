<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Party;
use App\Models\Game;
use illuminate\Support\Facades\Log;
use illuminate\support\facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{

        // UPDATE USER PROFILE

    public function updateMyProfile(Request $request){

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:225',
                'nickname' => 'required'
            ]);
            
            if($validator ->fails()) {
                return response([
                    'success' => false,
                    'messages' => $validator->messages()
                ],400);
            }

            $user_id = auth()->user()->id; 
            $user = User::query()->find($user_id);

            $user->name = $request->input('name');
            $user->nickname = $request ->input('nickname');
            $user->save();
            
            return response([
                'success' => true,
                'messages' => 'updated user!!',
                'data' =>$user,
                ], 200);
            
            } catch (\Throwable $th) {
                Log::error($th->getMessage());

                return response([
                    'success' => false,
                    'messages' => 'cant update :('
                ], 500);
            };
    
        }
                // GET ALL PARTIES FROM A USER
        public function getAllMyParties() 
        {
            Log::info('Getting all parties');

            try {

                $user_id = auth()->user()->id;
                $parties = Party::where(function($query){

                    $query->select('*')->from('users')->whereColumn('parties.user_id', 'user_id');


                },$user_id)->get();

                return response([
                    'success' => true,
                    'message' => 'Showing all your parties',
                    'data' => $parties
                ], 200);
            } catch (\Throwable $th){
                Log::error($th->getMessage());

                return response([
                    'success' => false,
                    'message' => 'Error getting all your parties'
                ],500);
            }
        }

                // GET ALL GAMES FROM A USER

        public function getAllMyGames()
            {
                Log::info('Getting all Games');

                try {

                    $user_id = auth()->user()->id;
                    $games = Game::where(function($query){
    
                        $query->select('*')->from('users')->whereColumn('games.user_id', 'user_id');
    
    
                    },$user_id)->get();
    
                    return response([
                        'success' => true,
                        'message' => 'Showing all your Games',
                        'data' => $games
                    ], 200);
                } catch (\Throwable $th){
                    Log::error($th->getMessage());
    
                    return response([
                        'success' => false,
                        'message' => 'Error getting all your Games'
                    ],500);
                }

            }    

        
        }
