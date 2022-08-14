<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Customer',
            'username' => 'customer',
            'email' => 'customer@customer.com',
            'password' => Hash::make('password'),
            'phone_number' => '089651887984',
            'birthday' => '02-12-1999',
        ]);

        for ($i = 1; $i < 10; $i++) {
            Address::factory()->for(User::factory(), 'model')->create();
        }

        Address::factory()->for($user, 'model')->create();
    }
}
