<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AuthController extends Controller
{
    const USER_ROL_ID = 1; 

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            
        ])
    }
}
