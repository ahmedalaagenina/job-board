<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use Tymon\JWTAuth\JWTGuard;

class AuthApiController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        /** @var JWTGuard $guard */
        $guard = auth('api');
        $token = $guard->attempt($credentials);
        if (! $token) {
            return response()->json(['error' => 'UnAuthorized Access'], 401);
        }

        return response()->json([
            'token' => $token,
            'expires_in' => $guard->factory()->getTTL() * 60,
        ]);
    }

    public function signup(SignupRequest $request) {}

    public function me()
    {
        $user = auth('api')->user();
        if (! $user) {
            return response()->json(['error' => 'You not authorized'], 401);
        }

        return response()->json([
            'user' => $user,
        ]);
    }

    public function refresh()
    {
        /** @var JWTGuard $guard */
        $guard = auth('api');
        $refreshToken = $guard->refresh();
        if (! $refreshToken) {
            return response()->json(['error' => 'something went wrong'], 401);
        }

        return response()->json([
            'token' => $refreshToken,
            'expires_in' => $guard->factory()->getTTL() * 60,
        ]);
    }

    public function logout()
    {
        /** @var JWTGuard $guard */
        $guard = auth('api');
        $guard->logout();

        return response()->json([
            'message' => 'logout success',
        ]);
    }
}
