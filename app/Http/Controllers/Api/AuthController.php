<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        //validate
        $validated = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'password' => 'string|required|max:12|confirmed',
        ]);
        //check if user registerd before
        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'message' => 'email aready used try by other'
            ], 201);
        }
        $request['password'] = Hash::make($request['password']);
        //create user
        $user = User::create($request->all());

        //generate token 
        $token = $user->createToken('newToken');

        return response()->json([
            'message' => 'user registerd successfuly',
            'token' => $token
        ], 201);
    }


    public function login(Request $request)
    {

        //validate
        $validated = $request->validate([
            'email' => 'string|required',
            'password' => 'required|string|min:3',
        ]);

        $user = User::where('email', $request->email)->first();
        //check if user registerd 
        if (!($user && Hash::check($request->password, $user->password))) {
            return response()->json([
                "message" => "user not registerd before or your password isn't correct"
            ], 404);
        }

        //remove all created tokens before 
        $user->tokens()->delete();

        //create new token
        $token = $user->createToken('newToken');

        return response()->json([
            'message' => 'user login successfuly',
            'token' => $token
        ], 201);
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'user logout successfuly',
        ]);
    }
}
