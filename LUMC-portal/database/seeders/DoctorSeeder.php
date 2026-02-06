<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a doctor account
        User::create([
            'name' => 'Ron Arvene Flordeliz',
            'email' => '2235122@slu.edu.ph',
            'password' => Hash::make('pass1234'),
            'role' => 'doctor',
        ]);

    User::create([
            'name' => 'John Doe',
            'email' => 'jdoe@slu.edu.ph',   
            'password'=> Hash::make('jdoe1234'),
            'role' => 'doctor',
        ]);
    }
}
