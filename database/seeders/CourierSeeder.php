<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courier = Courier::create([
            'name' => 'Kurir',
            'username' => 'kurir',
            'email' => 'kurir@kurir.com',
            'password' => Hash::make('password'),
            'phone_number' => '089651887984',
            'license_plate' => 'F 1818 AT',
        ]);

        Courier::factory(10)->create();
    }
}
