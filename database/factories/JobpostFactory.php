<?php

namespace Database\Factories;
use App\Models\Jobpost;
use App\Models\User;

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
            'recruiter_id' => User::where('role', 'recruiter')->inRandomOrder()->first()->id,
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->city,
            'salary' => $this->faker->randomFloat(2, 3000, 10000),
        ];
    }
}
