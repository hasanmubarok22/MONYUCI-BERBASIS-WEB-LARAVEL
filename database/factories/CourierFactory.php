<?php

namespace Database\Factories;

use App\Models\Courier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Courier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
            'password' => Hash::make('password'),
            'phone_number' => $this->faker->phoneNumber,
            'license_plate' => $this->faker->sentence(3, true),
        ];
    }
}
