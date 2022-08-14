<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement([
            'Daily Kiloan',
            'Satuan Premium',
            'Sepatu',
        ]);
        if ($type === 'Daily Kiloan') {
            $name = $this->faker->randomElement([
                'Paket 1 (max 3 days)',
                'Paket 2 (next days)',
            ]);
            $unit = 'kg';
            $price = rand(10000, 15000);
        } else if ($type === 'Satuan Premium') {
            $name = $this->faker->randomElement([
                'Kaos',
                'Rok Panjang/Pendek',
                'Kemeja/Blus',
            ]);
            $price = rand(15000, 22000);
            $unit = 'kg';
        } else if ($type === 'Sepatu') {
            $name = 'Sepatu';
            $unit = 'pasang';
            $price = rand(30000, 80000);
        }


        return [
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'unit' => $unit,
        ];
    }
}
