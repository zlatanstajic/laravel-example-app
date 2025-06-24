<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        User::create([
            'name' => 'Zlatan Stajić',
            'email' => 'contact@zlatanstajic.com',
            'password' => Hash::make('zlatanstajic!12345'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::where('email', 'contact@zlatanstajic.com')->delete();
    }
};
