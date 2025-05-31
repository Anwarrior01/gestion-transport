<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        // SIGN IN USING JWT AND GUARD 'API'
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // IF TOKEN = USER DATA
        return response()->json([
            'token' => $token,
            'user' => auth('api')->user(),
        ]);
    }

    // USER DATA
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    // LOG OUT
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
