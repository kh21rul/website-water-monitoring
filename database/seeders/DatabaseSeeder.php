<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Monitoring;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Monitoring::create([
            'temperature' => 0,
            'turbidity' => 0,
            'ph' => 0,
            'dissolved_oxygen' => 0,
            'kualitas_air' => 'Baik',
            'sistem_kendali' => 'Hidup',
        ]);
    }
}
