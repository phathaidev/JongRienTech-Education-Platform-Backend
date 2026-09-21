<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Validation\ValidationException;

class UserService
{
    /**
     * To register new user to the DB
     */
    public function register(
        string $name,
        string $email,
        string $password,
        bool $verified,
        string $profilePicture
    ) {
        // Store to db
        $user = User::create(
            [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'verified' => $verified,
                'profile_picture' => $profilePicture
            ]
        );

        return ['user' => $user];
    }
}
