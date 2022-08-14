<?php

namespace Database\Factories;

use App\Models\Bankaccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankaccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bankaccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'card_holder' => $this->faker->name,
            'card_type' => $this->faker->creditCardType,
            'card_number' => $this->faker->creditCardNumber,
            'card_branch' => $this->faker->cityName,
            'card_city' => $this->faker->cityName,
        ];
    }
}
