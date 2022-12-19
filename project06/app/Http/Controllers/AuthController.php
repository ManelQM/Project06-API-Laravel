<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    const USER_ROL_ID = 1; 

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:225',
            'nickname'=> 'required|string|max:255',
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

            //LOGIN

    public function login (Request $request){
        $input = $request->only('email', 'password');
        $jwt_token = null;
        
        if(!$jwt_token =JWTAuth::attempt($input)){
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }
        return response() -> json([
            'success' => true,
            'token' => $jwt_token,
        ]);

    }

            //LOGOUT

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function myProfile (){
        return response() -> json([
            'user' => auth()->user()
        ]);
    }
}


