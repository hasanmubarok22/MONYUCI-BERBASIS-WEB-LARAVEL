<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Bankaccount;
use App\Models\Laundry;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laundryDev = Laundry::create([
            'name' => 'Laundry',
            'username' => 'laundry',
            'email' => 'laundry@laundry.com',
            'password' => Hash::make('password'),
            'phone_number' => '0897651887984',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac lobortis nunc, a dictum dolor. Integer ullamcorper purus porta lacus rutrum, eu hendrerit est placerat. Integer ut sollicitudin ante. Aliquam orci orci, semper faucibus cursus in, sodales ac velit. Vivamus porta ex ante, in ullamcorper turpis tristique ac. Nulla sit amet egestas ipsum.',
        ]);
        for ($i = 1; $i < 10; $i++) {
            $laundry = Laundry::factory(1)->create()->first();
            // dd($laundry);
            $address = Address::factory(1)->for($laundry, 'model')->create();
            $bank = Bankaccount::factory(1)->for($laundry, 'model')->create();
            $bank->first()->assignLabel(['Main']);
            $service = Service::factory(5)->for($laundry)->create();
        }
        $address = Address::factory(1)->for($laundryDev, 'model')->create();
        $bank = Bankaccount::factory(1)->for($laundryDev, 'model')->create();
        $service = Service::factory(5)->for($laundryDev)->create();
    }
}
