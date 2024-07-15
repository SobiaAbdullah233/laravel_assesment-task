<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login user
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            abort('401', 'Invalid credentials');
        }

        $user = Auth::user();
        $token = $user->createToken('api')->accessToken;

        return $this->respond(
            message: 'Logged in successfully.',
            data: ['user' => $user, 'token' => $token],
        );
    }


    /**
     * Register user account
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::create($validated);
        $user->assignRole('User');

        $token = $user->createToken('api')->accessToken;

        return $this->respond(
            message: 'Logged in successfully.',
            data: ['user' => $user, 'token' => $token],
        );
    }


    /**
     * Logout current user
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return $this->respond(message: 'Logged out successfully.');
    }
}
