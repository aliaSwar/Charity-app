<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{

    /**
     * login user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name'     => 'required|string',
            'password'  => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            // he is a real

            $user = $request->user();

            $token = $user->createToken('auth')->plainTextToken;

            $response = [
                'message' => 'User successfully login',
                'user'      =>  $user,
                'token'     =>  $token
            ];
            return response($response, 201);
        }
    }

    /**
     * Logout user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        
        auth()->user()->tokens()->delete();
        return [
            'message' => 'has Logout'
        ];
    }
}
