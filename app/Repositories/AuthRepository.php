<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Authentication Repository
 *
 * @package App\Repositories
 */
class AuthRepository
{
    /**
     * Find user by email.
     *
     * @param string $email
     *
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    /**
     * Verify user password.
     *
     * @param User $user
     * @param string $password
     *
     * @return bool
     */
    public function verifyPassword(User $user, string $password): bool
    {
        return Hash::check($password, $user->password);
    }
}
