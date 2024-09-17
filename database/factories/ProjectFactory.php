<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->randomDigit(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'author_id' => $this->faker->randomDigit()
        ];
    }
}
