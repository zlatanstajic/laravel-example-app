<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Http\JsonResponse;

class AuthService
{
    /**
     * @var AuthRepository
     */
    protected AuthRepository $authRepository;

    /**
     * @param AuthRepository $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @param array $credentials
     *
     * @return JsonResponse
     */
    public function authenticate(array $credentials): JsonResponse
    {
        // Find user by email
        $user = $this->authRepository->findByEmail($credentials['email']);

        // Verify password
        if (!$user || !$this->authRepository->verifyPassword($user, $credentials['password'])) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Generate API token
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}
