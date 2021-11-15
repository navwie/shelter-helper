<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Card;

class CardFactory extends Factory
{
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'category' => $this->faker->randomElement([
                'backlog',
                'toDo',
                'inProgress',
                'testing',
                'done'
            ]),
            'deadline' => $this->faker->dateTime()
        ];
    }
}
