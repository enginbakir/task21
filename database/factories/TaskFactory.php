<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'status' => $this->faker->numberBetween(1, 3),
            'user_id' => User::factory()->create()->id // $this->faker->numberBetween(),
        ];
    }
}
