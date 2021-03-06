<?php

namespace App\Http\Controllers;

use Dingo\Api\Facade\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid Credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'Could not create token'], 500);
        }

        $user = Auth::user();

        // all good so return the token
        return response()->json(['user' => $user, 'token' => $token]);

    }

    public function refreshToken()
    {
        $token = JWTAuth::getToken();
        Log::info("Trying to refresh token: $token");
        if (!$token) {
            return response()->json('Token NOT provided!', 401);
        }

        Log::info("Refreshing here, but the method throws exception!!??");

        $token = JWTAuth::refresh($token);

        return response()->json(compact('token'));
    }
}
