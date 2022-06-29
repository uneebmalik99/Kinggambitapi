<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    function login(Request $request)
    {
        $user= User::where('Email', $request->Email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->Password, $user->Password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
                }    
             $token = $user->createToken('my-app-token')->plainTextToken;
                $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response([
                'message' =>'SUCCESS',
                'DATA'=>$response,
             ],200);
             
                            // $response, 201);
    }
    
}
