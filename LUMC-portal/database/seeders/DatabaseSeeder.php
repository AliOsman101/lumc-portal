<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PatientProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create additional users with patient profiles
        User::factory(5)->create()->each(function (User $user) {
            $user->patientProfile()->create([
                'name' => $user->name,
                'email' => $user->email,
            ]);
        });
    }
}
