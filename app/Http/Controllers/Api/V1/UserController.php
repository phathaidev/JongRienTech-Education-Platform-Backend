<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\SignupRequest;
use App\Http\Resources\Api\V1\UserResource;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SignupRequest $signupRequest, UserService $userService)
    {
        $user = $userService->register(
            $signupRequest->validated('name'),
            $signupRequest->validated('email'),
            $signupRequest->validated('password'),
            $signupRequest->validated('verified'),
            $signupRequest->validated('profile_picture') ?? 'default.png'
        );

        return UserResource::make($user['user'])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
