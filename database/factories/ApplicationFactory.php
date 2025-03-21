<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Application;
use App\Models\User;
use App\Models\Jobpost;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Application::class;


    public function definition(): array
    {
        return [
            'candidate_id' => User::where('role', 'candidate')->inRandomOrder()->first()->id,
            'jobpost_id' => JobPost::inRandomOrder()->first()->id,
            'resume' => 'uploads/resumes/' . $this->faker->uuid . '.pdf',
            'cover_letter' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}
