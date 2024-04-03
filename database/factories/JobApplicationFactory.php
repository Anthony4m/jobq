<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resume' => 'resumes/' . $this->faker->fileExtension(),
            'cover_letter' => $this->faker->paragraph(5),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
