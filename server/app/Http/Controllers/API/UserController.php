<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function register(Request $request){
        try{
            $request->validate([
                'name'=>['required','string','max:255'],
                'username'=>['required','string','max:255','unique:users'],
                'email'=>['required','string','email','max:255','unique:users'],
                'phone'=>['required','string','max:255'],
                'password'=>['required','string',new Password],

            ]);

            User::create([
                'name'=>$request->name,
                'username'=>$request->username,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>$request->password,
            ]);

            $user=User::where('email',$request->email)->first();

            $tokenresult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success(
                [
                    'access_token'=>$tokenresult,
                    'token_type'=>'Bearer',
                    'user'=> $user
                ],'User Registered');

        }
        catch(Exception $error){
            return ResponseFormatter::error([
                'message' => 'ada yg salah',
                'error' => $error
            ], 'Authentication Failed', 500);

        }
    }
}