<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Services\AuthService;

class AuthController extends Controller
{
    /**
     * Handle the login request
     */
    public function login(LoginRequest $loginRequest, AuthService $authService)
    {
        $result = $authService->handleLogin(
            $loginRequest->validated('email'),
            $loginRequest->validated('password'),
            $loginRequest->validated('device_name') ?? 'api',
        );

        return response()->json([
            'user' => UserResource::make($result['user']),
            'token' => $result['token'],
        ]);
    }
}
