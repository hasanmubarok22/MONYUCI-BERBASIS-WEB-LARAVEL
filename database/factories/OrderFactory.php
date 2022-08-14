<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = $this->faker->randomElement([
            'Menunggu Kurir',
            'Proses Pengiriman',
            'Diterima Penatu',
            'Proses Pencucian',
            'Selesai Dicuci',
            'Proses Pengembalian',
            'Diterima Pelanggan',
            'Batal',
        ]);
        $pickedup = $this->faker->dateTime();
        $finished = null;
        $received = null;
        if ($status === 'Diterima Pelanggan') {
            $finished = $this->faker->dateTime($pickedup);
            $received = $this->faker->dateTime($finished);
        } else if ($status === 'Diterima Penatu') {
            $finished = $this->faker->dateTime($pickedup);
        }

        return [
            'total_cost' => 0,
            'status' => $status,
            'pickedup_at' => $pickedup,
            'finished_at' => $finished,
            'received_at' => $received,
        ];
    }
}
