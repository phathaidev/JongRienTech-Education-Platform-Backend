<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * To to authenticate the user login with existing data on db
     */
    public function handleLogin(string $email, string $password, string $deviceName = 'api'): array
    {
        $user = User::where('email', $email)->first();

        // Same message for both cases so attackers can't tell
        // whether an email exists.
        if (!$user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return [
            'user' => $user,
            'token' => $user->createToken($deviceName)->plainTextToken
        ];
    }
}
