<?php

namespace Database\Factories;
use App\Models\Jobpost;
use App\Models\User;
use App\Models\Application;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobpost>
 */
class JobpostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed> 
     */

     protected $model = Jobpost::class;

    public function definition(): array
    {
        return [
            'recruiter_id' => User::where('role', 'recruiter')->inRandomOrder()->first()->id ?? User::factory(),
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->city,
            'salary' => $this->faker->randomFloat(2, 30000, 150000),
            'image' => $this->faker->imageUrl(640, 480, 'business'),
        ];
    }
}
