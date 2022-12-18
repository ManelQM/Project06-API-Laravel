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
}
