<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'in_game_id' => $this->faker->numerify('########'),
            'in_game_nickname' => $this->faker->name(),
            'password' => bcrypt('123456')
        ];
    }
}
