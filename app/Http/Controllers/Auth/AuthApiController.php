<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use JWTException;

class AuthApiController extends Controller
{
    public function authenticate(Request $request){
        $credentials =$request->only('login','password');
        // dd($credentials);
        try{
            if(! $token = JWTAuth::attempt([
                'login'       => $request->login,
                'password'  => $request->password
            ])){
                return response()->json(['error'=>'inavlid credential'],401);
            }
            } catch (JWTException $e){
                return response()->json(['error'=>'could_note_create_toke'],500);
            }

            return response()->json(compact('token'));
        }
    
}
