<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    const USER_ROL_ID = 1; 

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:225',
            'email' => 'required|string|email|max:225|unique:users',
            'password' => 'required|string|password|min:6'
        ]);

        if ($validator -> fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()
            ],400);
        }

        $user = User::create([
            'name' => $request->get('name'), 
            'email' => $request ->get ('email'),
            'password' => bcrypt($request->password)
        ]);
        
        $user->roles()->attach(self::USER_ROL_ID);
        $token = JWTAuth::fromUser($user); 
        return response()->json (compact('user', 'token'),201);
    }
}

