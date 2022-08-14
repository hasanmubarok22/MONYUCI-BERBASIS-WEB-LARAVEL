<?php

namespace Database\Factories;

use Faker\Generator;
use Faker\Provider\id_ID\Address;
use App\Models\Address as Addresses;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Addresses::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = new Generator();
        $this->faker->addProvider(new Address($faker));
        return [
            'name' => $this->faker->name,
            'country' => $this->faker->country,
            'province' => $this->faker->state,
            'city' => $this->faker->cityName,
            'district' => $this->faker->street,
            'zipcode' => $this->faker->postcode,
            'other' => $this->faker->street,
        ];
    }
}
