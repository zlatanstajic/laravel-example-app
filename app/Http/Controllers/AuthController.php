<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Authentication Controller
 *
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @param AuthService $authService
     */
    public function __construct(readonly AuthService $authService)
    {
        //
    }

    /**
     * Create authentication token.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createToken(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        return $this->authService->authenticate($data);
    }
}
