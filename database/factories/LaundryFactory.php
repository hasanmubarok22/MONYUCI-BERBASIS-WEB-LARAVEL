<?php

namespace Database\Factories;

use App\Models\Laundry;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaundryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Laundry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $end = $this->faker->time('H:i:s');
        $start = $this->faker->time('H:i:s', $end);
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
            'password' => Hash::make('password'),
            'phone_number' => $this->faker->phoneNumber,
            'description' => $this->faker->text(2000),
            'operational_start' => $start,
            'operational_end' => $end,
        ];
    }
}
