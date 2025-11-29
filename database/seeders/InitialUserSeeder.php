<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * InitialUserSeeder
 *
 * Seeds the initial user into the database.
 *
 * @package Database\Seeders
 */
class InitialUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $name = 'Developer';
        $email = 'developer@example.com';
        $password = Str::random(24);

        // Prevent injecting real credentials in production:
        if (!app()->isLocal() && !config('app.debug')) {
            $this->command->info('Skipping initial user seeder in non-local environment.');
            return;
        }

        User::updateOrCreate(
            [
                'email' => $email
            ],
            [
                'name' => $name,
                'password' => Hash::make($password),
            ]
        );

        $this->command->info("Created {$name} user with email {$email} and password: {$password}");
    }
}
