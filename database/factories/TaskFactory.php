<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'status' => $this->faker->numberBetween(1,3),
            'user_id' => UserFactory::new()->create(),
        ];
    }
}
