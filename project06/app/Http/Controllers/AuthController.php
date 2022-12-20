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
        const USER_ROL_ID = 0; 

    public function register(Request $request)
    {
        // dd($request->name);
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:225',
            'nickname'=>'required|string|max:255',
            'email'=>'required|string|email|max:225|unique:users',
            'password'=>'required|string|min:'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()
            ],400);
        }

        $user = User::create([
            'name' => $request->name, 
            'nickname' => $request ->nickname,
            'email' => $request ->email,
            'password' => bcrypt($request->password)
        ]);
        
        // $user->roles()->attach(self::USER_ROL_ID);
        $token = JWTAuth::fromUser($user); 
        return response()->json (compact('user', 'token'),201);
    }

            //LOGIN

    public function login (Request $request){
        $input = $request->only("email", "password");
        $jwt_token = null;
        // dd($request->password);
        if(!$jwt_token =JWTAuth::attempt($input)){
            // dd($input);
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

    public function logout(){
           try {
            auth()->logout();
            return response()->json(['message' => 'Logged out!!!']);
                } 
                
                catch (\Throwable $th) {
                   
                    return response()->json([
                        'success' => true,
                        'message' => 'Cant log out'
                    ], 500);
                }
            }
        
    public function myProfile (){
        return response() -> json([
            'user' => auth()->user()
        ]);
    }
}


