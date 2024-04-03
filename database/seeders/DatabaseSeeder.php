<?php

namespace Database\Seeders;

use App\Models\JobApplication;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'user',
            'email' => 'test@example.com',
            'password'=>'123456',
        ]);
        JobListing::factory(6)->create([
            'user_id' => $user->id
        ]);

        JobApplication::factory(10)->create([
            'user_id' => $user->id,
            'job_listing_id' => JobListing::all()->random()->id
        ]);

    }
}
